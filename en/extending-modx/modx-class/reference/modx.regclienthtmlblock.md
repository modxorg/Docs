---
title: "modX.regClientHTMLBlock"
description: "Register HTML to be injected before the closing BODY tag."
_old_id: "1091"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclienthtmlblock"
---

## modX::regClientHTMLBlock

Register HTML to be injected before the closing BODY tag.

## Syntax

``` php
void regClientHTMLBlock (string $html)
```

## Example

Inject a footer into the page.

``` php
$modx->regClientHTMLBlock('<div id="footer">(c) 2009 MODX</div>');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientCSS](extending-modx/modx-class/reference/modx.regclientcss "modX.regClientCSS")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")
