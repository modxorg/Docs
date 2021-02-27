---
title: "modX.getParser"
_old_id: "1069"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getparser"
---

## modX::getParser

Gets the MODX parser.

Returns an instance of modParser responsible for parsing tags in element content, performing actions, returning content and/or sending other responses in the process.

## Syntax

API Doc: [modX::getParser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getParser())

``` php
object getParser()
```

## Example

Get the MODX Parser object.

``` php
$parser = $modx->getParser();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
