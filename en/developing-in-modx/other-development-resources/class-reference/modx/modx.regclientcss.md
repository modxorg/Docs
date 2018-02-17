---
title: "modX.regClientCSS"
_old_id: "1090"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientcss"
---

## modX::regClientCSS

Register CSS to be injected inside the HEAD tag of a resource.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientCSS()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientCSS())

```
<pre class="brush: php">
void regClientCSS (string $src)

```## Example

Register a CSS file to the HEAD tag:

```
<pre class="brush: php">
$modx->regClientCSS('assets/css/style.css');

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.regClientHTMLBlock](developing-in-modx/other-development-resources/class-reference/modx/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")