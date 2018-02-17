---
title: "modX.checkForLocks"
_old_id: "1053"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.checkforlocks"
---

## modX::checkForLocks

Checks for locking on a page. A page is "locked" if another user is already viewing it. This prevents collisions.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::checkForLocks()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::checkForLocks())

```
<pre class="brush: php">
void checkForLocks (integer $id, string $action, string $type)

```## Example

Check for locks on the edit\_chunk action.

```
<pre class="brush: php">
if ($modx->checkForLocks($modx->getLoginUserID(),'edit_chunk','edit');

```## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")