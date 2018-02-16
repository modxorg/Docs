---
title: "modX.getParser"
_old_id: "1069"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getparser"
---

modX::getParser
---------------

Gets the MODx parser.

Returns an instance of modParser responsible for parsing tags in element content, performing actions, returning content and/or sending other responses in the process.

Syntax
------

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getParser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getParser())

```
<pre class="brush: php">
object getParser()

```Example
-------

Get the MODx Parser object.

```
<pre class="brush: php">
$parser = $modx->getParser();

```See Also
--------

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")