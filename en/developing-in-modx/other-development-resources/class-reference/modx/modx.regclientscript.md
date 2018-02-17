---
title: "modX.regClientScript"
_old_id: "1092"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.regclientscript"
---

## modX::regClientScript

Register JavaScript to be injected before the closing BODY tag.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::regClientScript()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::regClientScript())

```
<pre class="brush: php">
void regClientScript (string $src, [boolean $plaintext = false])

```## Example

Add some JS to the end of the page.

```
<pre class="brush: php">
$modx->regClientScript('assets/js/footer.js');

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [modX.regClientCSS](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientcss "modX.regClientCSS")
- [modX.regClientHTMLBlock](developing-in-modx/other-development-resources/class-reference/modx/modx.regclienthtmlblock "modX.regClientHTMLBlock")
- [modX.regClientStartupHTMLBlock](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartuphtmlblock "modX.regClientStartupHTMLBlock")
- [modX.regClientStartupScript](developing-in-modx/other-development-resources/class-reference/modx/modx.regclientstartupscript "modX.regClientStartupScript")
- [modX.getRegisteredClientScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientscripts "modX.getRegisteredClientScripts")
- [modX.getRegisteredClientStartupScripts](developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientstartupscripts "modX.getRegisteredClientStartupScripts")