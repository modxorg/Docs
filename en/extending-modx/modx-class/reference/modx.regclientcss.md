---
title: "modX.regClientCSS"
description: "Register CSS to be injected inside the HEAD tag of a resource"
---

## modX::regClientCSS

Register CSS to be injected inside the HEAD tag of a resource.

## Syntax

API Doc: [modX::regClientCSS()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientCSS())

``` php
void regClientCSS (string $src, [string $media = null])
```

- `$src` _(string)_ The CSS to be injected before the closing HEAD tag in an HTML response. **required**
- `$media` _(string)_ Possible values are: `all`, `aural`, `braille`, `embossed`, `handheld`, `print`, `projection`, `screen`, `tty`, `tv` 


## Example

Register a CSS file to the HEAD tag for `all` 'media':

``` php
$modx->regClientCSS('assets/css/style.css', 'all');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.regClientHTMLBlock](extending-modx/modx-class/reference/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](extending-modx/modx-class/reference/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](extending-modx/modx-class/reference/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](extending-modx/modx-class/reference/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](extending-modx/modx-class/reference/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](extending-modx/modx-class/reference/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")
