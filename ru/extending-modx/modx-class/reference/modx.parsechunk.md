---
title: "modX.parseChunk"
description: "Разобрать чанк, используя ассоциативный массив переменных замещения."
translation: "extending-modx/modx-class/reference/modx.parsechunk"
---

## modX::parseChunk

Разобрать чанк, используя ассоциативный массив переменных замещения.

**Устарел с версии 3.0, будет удалён в MODX 4.0** — используйте [`$modx->getChunk()`](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk"). Каждый вызов пишет в лог запись об устаревании.

**parseChunk** просто выполняет `str_replace` для значений передаваемого им ассоциативного массива, поэтому выходные фильтры и другие сложные модификаторы плейсхолдеров здесь не работают.

## Синтаксис

``` php
string parseChunk (string $chunkName, array $chunkArr, [string $prefix = '[[+'], [string $suffix = ']]'])
```

## Пример

``` php
$output = $modx->parseChunk('myChunk',array('name' => 'John'));
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk")
