---
title: "modUser.isAuthenticated"
_old_id: "1346"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.isauthenticated"
description: "Check whether the User is authenticated in a Context"
---

## modUser::isAuthenticated

Determines if this User is authenticated in a specific Context.

## Syntax

``` php
boolean isAuthenticated ([string $sessionContext = 'web'])
```

## Example

Deny access unless the User is logged into the `web` Context:

``` php
if (!$modx->user->isAuthenticated('web')) {
   $modx->sendUnauthorizedPage();
}
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
