---
title: "modX.stripTags"
translation: "extending-modx/modx-class/reference/modx.striptags"
description: "Удалить из строки HTML-теги и совпадения по шаблонам"
---

## modX::stripTags

Снимает HTML- и PHP-теги через PHP `strip_tags()`, затем удаляет из результата совпадения регулярных выражений. Каждый шаблон применяется повторно, пока он не перестанет совпадать или не исчерпается `$depth` проходов.

Набор по умолчанию в `modX::$sanitizePatterns` убирает блоки `<script>`, числовые сущности, теги `[[...]]` и голые маркеры `[[` или `]]`. Передайте значение, не являющееся массивом, например `null`, чтобы пропустить этап шаблонов.

## Синтаксис

``` php
string stripTags (string $html, [string $allowed = ''], [array $patterns = array()], [int $depth = 10])
```

- `$html` _(string)_ содержимое для очистки
- `$allowed` _(string)_ теги, которые сохраняет `strip_tags()`, по умолчанию не сохраняется ни один
- `$patterns` _(array)_ шаблоны для удаления; пустой массив выбирает `modX::$sanitizePatterns`, по умолчанию `array()`
- `$depth` _(int)_ применений на шаблон, по умолчанию `10`; нулевое значение становится `10`

## Пример

``` php
$clean = $modx->stripTags('<p>Hello [[+name]]</p>');
// 'Hello '

$clean = $modx->stripTags('<p>Hello [[+name]]</p>', '<p>');
// '<p>Hello </p>'
```

## Смотрите также

- [modX](extending-modx/core-model/modx)
- [modX.sanitizeString](extending-modx/modx-class/reference/modx.sanitizestring)
