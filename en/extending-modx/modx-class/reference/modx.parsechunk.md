---
title: "modX.parseChunk"
description: "Parse a chunk using an associative array of replacement variables."
_old_id: "1089"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.parsechunk"
---

## modX::parseChunk

Parse a chunk using an associative array of replacement variables.

**Deprecated since 3.0, to be removed in MODX 4.0** — use [`$modx->getChunk()`](extending-modx/modx-class/reference/modx.getchunk "modX.getChunk") instead. Every call writes a deprecation record to the log.

**parseChunk** runs a plain str\_replace on the values you pass, so output filters and other complex placeholder modifiers do not work here.

## Syntax

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
