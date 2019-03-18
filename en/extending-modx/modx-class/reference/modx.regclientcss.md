---
title: "modX.regClientCSS"
_old_id: "1090"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientcss"
---

## modX::regClientCSS

Register CSS to be injected inside the HEAD tag of a resource.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientCSS()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientCSS())

``` php 
void regClientCSS (string $src)
```

## Example

Register a CSS file to the HEAD tag:

``` php 
$modx->regClientCSS('assets/css/style.css');
```

## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.regClientHTMLBlock](extending-modx/core-model/modx/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/core-model/modx/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/core-model/modx/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](extending-modx/core-model/modx/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/core-model/modx/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/core-model/modx/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")