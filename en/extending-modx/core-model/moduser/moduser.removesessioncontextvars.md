---
title: "modUser.removeSessionContextVars"
_old_id: "1350"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.removesessioncontextvars"
description: "Remove the session variables stored for a Context"
---

## modUser::removeSessionContextVars

Removes the session variables stored for a Context.

## Syntax

``` php
void removeSessionContextVars (string $context)
```

## Example

``` php
$user->removeSessionContextVars('sports');
```

## See Also

- [modUser](extending-modx/core-model/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
