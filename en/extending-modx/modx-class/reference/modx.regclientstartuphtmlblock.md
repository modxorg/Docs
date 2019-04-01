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

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")