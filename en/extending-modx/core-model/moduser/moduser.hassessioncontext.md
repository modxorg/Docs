---
title: "modUser.hasSessionContext"
_old_id: "1345"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.hassessioncontext"
description: "Check whether the User is logged into a Context"
---

## modUser::hasSessionContext

Checks whether the User is "logged into" a Context.

## Syntax

``` php
boolean hasSessionContext (mixed $context)
```

## Example

``` php
if ($user->hasSessionContext('sports')) {
    // the User is logged into the 'sports' Context
}
```

## See Also

- [modUser](extending-modx/core-model/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
