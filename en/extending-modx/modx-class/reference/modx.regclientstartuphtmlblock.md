---
title: "modX.regClientStartupHTMLBlock"
_old_id: "1093"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartuphtmlblock"
---

## modX::regClientStartupHTMLBlock

Register HTML to be injected before the closing HEAD tag.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientStartupHTMLBlock()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientStartupHTMLBlock())

``` php 
void regClientStartupHTMLBlock (string $html)
```

## Example

Render a faux tag element before the end of the HEAD.

``` php 
$modx->regClientStartupHTMLBlock('<tag></tag>');
```

## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.regClientCSS](extending-modx/core-model/modx/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](extending-modx/core-model/modx/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/core-model/modx/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupScript](extending-modx/core-model/modx/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/core-model/modx/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/core-model/modx/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")