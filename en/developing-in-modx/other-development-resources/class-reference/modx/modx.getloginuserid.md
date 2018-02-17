---
title: "modX.getLoginUserID"
_old_id: "1066"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getloginuserid"
---

## modX::getLoginUserID

Returns the current user ID, for the current or specified context.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getLoginUserID()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getLoginUserID())

```
<pre class="brush: php">
string getLoginUserID ([string $context = ''])

```## Example

Get the current login user ID for the 'sports' context.

```
<pre class="brush: php">
$id = $modx->getLoginUserID('sports');

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")