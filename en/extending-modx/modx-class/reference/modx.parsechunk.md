---
title: "modX.parseChunk"
_old_id: "1089"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.parsechunk"
---

## modX::parseChunk

Parse a chunk using an associative array of replacement variables.

**parseChunk** simply does a str\_replace on the values in the associative array you pass it, so you cannot use Output Filters or other complex placeholder modifiers here. If you require more functionality from the parser, see [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk") instead.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::parseChunk()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::parseChunk())

``` php
string parseChunk (string $chunkName, array $chunkArr, [string $prefix = '[[+'], [string $suffix = ']]'])
```

## Example

``` php
$output = $modx->parseChunk('myChunk',array('name' => 'John'));
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.getChunk](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk")