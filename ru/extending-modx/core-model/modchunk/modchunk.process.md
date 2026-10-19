---
title: "modChunk.process"
translation: "extending-modx/core-model/modchunk/modchunk.process"
description: "Отрендерить Chunk с заданными свойствами и вернуть вывод"
---

## modChunk::process

Метод рендерит Chunk и возвращает вывод.

1. `modElement::process` накладывает переданные свойства поверх сохранённых значений и property set, применяет входной фильтр и загружает контент. Строковый `$content` подменяет сохранённый контент на этот вызов.
2. Парсер обходит тело в поиске тегов `[[...]]`; каждое свойство доступно как плейсхолдер `[[+key]]`. Обход повторяется до `parser_max_iterations` раз, по умолчанию `10`. Это не системная настройка — см. [Парсинг MODX тегов](extending-modx/parsing-tags).
3. Выполняется выходной фильтр.
4. Результат кэшируемого Chunk попадает в кэш элементов на время запроса, и повторный вызов с тем же тегом его переиспользует.

## Синтаксис

``` php
string process ([array|string $properties = null, string $content = null])
```

- `$properties` _(array|string)_ Накладываются поверх свойств Chunk и их property set перед рендером, по умолчанию `null`.
- `$content` _(string)_ Подменяет сохранённый контент Chunk на этот вызов; значения не из строки игнорируются, по умолчанию `null`.
- Объявлен в `modChunk` (`core/src/Revolution/modChunk.php`), переопределяет `modElement::process` (`core/src/Revolution/modElement.php`).

## Пример

``` php
$chunk = $modx->getObject('modChunk', ['name' => 'MyChunk']);
$chunk->setContent('<p>Hello, [[+name]]!</p>');
echo $chunk->process([
    'name' => 'staff',
]);
```

## Смотрите также

- [modChunk](extending-modx/core-model/modchunk)
- [modChunk.getContent](extending-modx/core-model/modchunk/modchunk.getcontent)
- [modChunk.setContent](extending-modx/core-model/modchunk/modchunk.setcontent)
- [Parsing MODX Tags](extending-modx/parsing-tags)
