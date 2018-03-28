---
title: "modX.getRegisteredClientScripts"
_old_id: "1071"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientscripts"
---

## modX::getRegisteredClientScripts

Returns all registered JavaScript and HTML blocks.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getRegisteredClientScripts()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getRegisteredClientScripts())

``` php 
string getRegisteredClientScripts ()
```

## Example

Get all registered scripts into an array.

``` php 
$scripts = $modx->getRegisteredClientScripts();
```

## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")