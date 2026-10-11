---
title: "modUser.removeSessionCookie"
_old_id: "1351"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.removesessioncookie"
description: "Remove the User's session cookie for a Context"
---

## modUser::removeSessionCookie

Removes the User's session cookie for a Context. The method body is currently empty (`TODO` in `modUser::removeSessionCookie()`), so the call removes nothing; `endSession()` is what actually expires the session cookie.

## Syntax

``` php
void removeSessionCookie (string $context)
```

## Example

``` php
$user->removeSessionCookie('sports');
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
