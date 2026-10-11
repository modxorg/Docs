---
title: "modUser.removeSessionContext"
_old_id: "1349"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.removesessioncontext"
description: "Remove a Context from the User's session"
---

## modUser::removeSessionContext

Removes a Context from the User's session.

## Syntax

``` php
void removeSessionContext (string|array $context)
```

## Example

``` php
$user->removeSessionContext('sports');
```

## See Also

- [modUser](extending-modx/core-model/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
