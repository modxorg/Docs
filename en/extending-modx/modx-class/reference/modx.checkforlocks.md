---
title: "modX.checkForLocks"
description: "Checks for locking on a page."
_old_id: "1053"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.checkforlocks"
---

## modX::checkForLocks

Checks for locking on a page. A page is "locked" if another user is already viewing it.

## Syntax

``` php
string|false checkForLocks (integer $id, string $action, string $type)
```

- `$id` _(integer)_ ID of the user checking for the lock; if empty or `0`, the current logged-in user is used
- `$action` _(string)_ The action identifying what is locked
- `$type` _(string)_ Message indicating the kind of lock being checked

Returns the translated `lock_msg` lexicon string (naming the user who holds the lock) if the page is locked, or `false` if it is not.


## Example

Check for locks on the edit\_chunk action.

``` php
$msg = $modx->checkForLocks($modx->getLoginUserID(), 'edit_chunk', 'edit');
if ($msg) {
    echo $msg;
}
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
