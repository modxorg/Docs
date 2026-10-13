---
title: "modX.regClientStartupHTMLBlock"
description: "Register HTML to be injected before the closing HEAD tag."
_old_id: "1093"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartuphtmlblock"
---

## modX::regClientStartupHTMLBlock

Register HTML to be injected before the closing HEAD tag.

## Syntax

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
