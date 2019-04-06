---
title: "modX.regClientHTMLBlock"
_old_id: "1091"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclienthtmlblock"
---

## modX::regClientHTMLBlock

Register HTML to be injected before the closing BODY tag.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientHTMLBlock()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientHTMLBlock())

``` php
void regClientHTMLBlock (string $html)
```

## Example

Inject a footer into the page.

``` php
$modx->regClientHTMLBlock('<div id="footer">(c) 2009 MODx</div>');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")