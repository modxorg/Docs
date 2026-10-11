---
title: "modUser.addSessionContext"
_old_id: "1340"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.addsessioncontext"
description: "Add a Context to the User's session"
---

## modUser::addSessionContext

Adds a Context to the User's session.

## Syntax

``` php
void addSessionContext (string $context)
```

## Example

``` php
$modx->user->addSessionContext('sports');
```

Call it on a User object, not on `$modx`.

## See Also

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
