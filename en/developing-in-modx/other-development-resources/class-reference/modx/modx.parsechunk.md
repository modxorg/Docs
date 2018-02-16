---
title: "modX.parseChunk"
_old_id: "1089"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.parsechunk"
---

modX::parseChunk
----------------

Parse a chunk using an associative array of replacement variables.

<div class="info">**parseChunk** simply does a str\_replace on the values in the associative array you pass it, so you cannot use Output Filters or other complex placeholder modifiers here. If you require more functionality from the parser, see [modX.getChunk](developing-in-modx/other-development-resources/class-reference/modx/modx.getchunk "modX.getChunk") instead.</div>Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::parseChunk()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::parseChunk())

```
<pre class="brush: php">
string parseChunk (string $chunkName, array $chunkArr, [string $prefix = '[[+'], [string $suffix = ']]'])

```Example
-------

```
<pre class="brush: php">
$output = $modx->parseChunk('myChunk',array('name' => 'John'));

```See Also
--------

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.getChunk](developing-in-modx/other-development-resources/class-reference/modx/modx.getchunk "modX.getChunk")