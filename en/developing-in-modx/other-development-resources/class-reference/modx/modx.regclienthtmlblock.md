---
title: "modX.regClientHTMLBlock"
_old_id: "1091"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclienthtmlblock"
---

## modX::regClientHTMLBlock

Register HTML to be injected before the closing BODY tag.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientHTMLBlock()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientHTMLBlock())

```
<pre class="brush: php">
void regClientHTMLBlock (string $html)

```## Example

Inject a footer into the page.

```
<pre class="brush: php">
$modx->regClientHTMLBlock('<div id="footer">(c) 2009 MODx</div>');

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.regClientCSS](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientcss "modX.regClientCSS")
- [modX.regClientScript](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientscript "modX.regClientScript")
- [modX.regClientStartupHTMLBlock](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")