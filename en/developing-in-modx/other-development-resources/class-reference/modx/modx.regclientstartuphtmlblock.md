---
title: "modX.regClientStartupHTMLBlock"
_old_id: "1093"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartuphtmlblock"
---

## modX::regClientStartupHTMLBlock

Register HTML to be injected before the closing HEAD tag.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientStartupHTMLBlock()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientStartupHTMLBlock())

```
<pre class="brush: php">
void regClientStartupHTMLBlock (string $html)

```## Example

Render a faux tag element before the end of the HEAD.

```
<pre class="brush: php">
$modx->regClientStartupHTMLBlock('<tag></tag>');

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.regClientCSS](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](developing-in-modx/other-development-resources/class-reference/modx/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientScript](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupScript](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")