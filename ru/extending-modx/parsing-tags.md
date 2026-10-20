---
title: Парсинг MODX тегов
description: Разбор тегов MODX вне обычного потока выполнения через modParser::processElementTags, включая некэшируемые теги и сырое содержимое элементов.
translation: "extending-modx/parsing-tags"
---

Используйте страницу, когда нужно разобрать [сниппеты, чанки или теги лексиконов](building-sites/tag-syntax) вне обычной отрисовки страницы: при генерации тела письма или при возврате полностью обработанного содержимого из API.

[modX::getChunk](extending-modx/modx-class/reference/modx.getchunk) уже прогоняет парсер по чанку. Не разобранными остаются некэшируемые теги — `[[!Wayfinder]]`, `[[!getResources?…]]` — потому что `modChunk::process()` передаёт парсеру флаг `isProcessingUncacheable()`, а вне отрисовки он равен `false`.

Дописать разбор помогает `modParser::processElementTags()`.

## Из чанка

`getChunk()` уже обработал кэшируемые теги, поэтому достаточно одного прохода:

``` php
$content = $modx->getChunk('MyChunkName', ['foo' => 'bar']);

$parser = $modx->getParser();
$maxIterations = (integer) $modx->getOption('parser_max_iterations', null, 10);

// Разбираем некэшируемые теги, убирая всё, что разобрать не удалось
$parser->processElementTags('', $content, true, true, '[[', ']]', [], $maxIterations);

return $content;
```

## Из сырого содержимого

[modElement::getContent()](extending-modx/core-model/modchunk/modchunk.getcontent) возвращает исходник как есть, со всеми тегами. Разбирайте его в два прохода: первый обрабатывает кэшируемые теги, второй — некэшируемые.

``` php
$chunk = $modx->getObject('modChunk', 'MyChunkName');
$content = $chunk->getContent();

$parser = $modx->getParser();
$maxIterations = (integer) $modx->getOption('parser_max_iterations', null, 10);

$parser->processElementTags('', $content, false, false, '[[', ']]', [], $maxIterations);
$parser->processElementTags('', $content, true, true, '[[', ']]', [], $maxIterations);

return $content;
```

> [!WARNING]
> Каждый вызов `processElementTags()` вызывает событие плагина `OnParseDocument`. Рецепт с двумя проходами вызывает его дважды — плагины на этом событии отработают дважды и могут изменить содержимое через переданную ссылку.

## Справка по методу

``` php
$processed = $parser->processElementTags(
    $parentTag,
    &$content,
    $processUncacheable = false,
    $removeUnprocessed = false,
    $prefix = '[[',
    $suffix = ']]',
    $tokens = [],
    $depth = 0
);
```

| Параметр | Назначение |
| --- | --- |
| `$parentTag` | Тег обрабатываемого элемента. Совпадающий с ним тег обнуляется, чтобы парсер не съел собственный разделитель; передайте `''`, чтобы отключить проверку |
| `$content` | Разбираемая строка. Передаётся **по ссылке** — результат пишется обратно в переменную, а не возвращается |
| `$processUncacheable` | Обрабатывать ли на этом проходе теги `[[!…]]` |
| `$removeUnprocessed` | Убирать ли теги без вывода вместо того, чтобы оставить их на месте |
| `$prefix` / `$suffix` | Разделители, по умолчанию `[[` и `]]` |
| `$tokens` | Ограничить разбор указанными первыми символами-токенами (`+`, `%`, `~`, `$`, `*`, `-`). Пустой массив означает «все» |
| `$depth` | Число дополнительных проходов по выводу |

Возвращаемое значение — количество обработанных тегов.

## Глубина разбора

`$depth` считает дополнительные проходы, а не уровни вложенности. Счётчик уменьшается на единицу при входе, и следующий проход выполняется, только пока он больше нуля, поэтому `10` даёт не более десяти проходов по содержимому.

Значение берётся из `parser_max_iterations`, и это **не** системная настройка — в менеджере её нет. `modX::getOption()` обращается к `$modx->config`, поэтому задавайте её в `core/config/config.inc.php`:

``` php
$config_options = ['parser_max_iterations' => 20];
```

По умолчанию `10`.

## Зачем два прохода

Настройка [parser_recurse_uncacheable](building-sites/settings/parser_recurse_uncacheable) (настоящая системная настройка, включена по умолчанию) запрещает парсеру встраивать вывод некэшируемых элементов в кэшируемое содержимое. Если её выключить, вывод некэшируемого элемента может закэшироваться внутри окружающего кэшируемого содержимого — поэтому проход с некэшируемыми тегами идёт последним.

## Смотрите также

- [modX::getChunk](extending-modx/modx-class/reference/modx.getchunk)
- [modChunk::getContent()](extending-modx/core-model/modchunk/modchunk.getcontent)
- [modChunk::process()](extending-modx/core-model/modchunk/modchunk.process)
- [Синтаксис тегов](building-sites/tag-syntax)