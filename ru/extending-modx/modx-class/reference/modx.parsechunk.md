---
title: "modX.parseChunk"
translation: "extending-modx/modx-class/reference/modx.parsechunk"
---

## modX::parseChunk

Разобрать чанк, используя ассоциативный массив переменных замещения.

**parseChunk** просто выполняет `str_replace` для значений передаваемого им ассоциативного массива, поэтому вы не можете использовать выходные фильтры или другие сложные модификаторы плейсхолдеров здесь. Если вам требуется больше функциональности от парсера, смотрите [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk").

## Синтаксис

API Doc: [modX::parseChunk()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::parseChunk())

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
