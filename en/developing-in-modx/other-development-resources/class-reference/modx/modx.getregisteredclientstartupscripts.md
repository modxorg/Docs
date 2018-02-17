---
title: "modX.getRegisteredClientStartupScripts"
_old_id: "1072"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientstartupscripts"
---

## modX::getRegisteredClientStartupScripts

Returns all registered startup CSS, JavaScript, or HTML blocks.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getRegisteredClientStartupScripts()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getRegisteredClientStartupScripts())

```
<pre class="brush: php">
string getRegisteredClientStartupScripts ()

```## Example

Get all registered startup scripts into an array.

```
<pre class="brush: php">
$startupScripts = $modx->getRegisteredClientStartupScripts();

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")