---
title: "modUser.getDashboard"
description: "Return the modDashboard assigned to the User's primary group"
---

## modUser::getDashboard

Reads the `Dashboard` relation of the primary group. Without a primary group, or when the group has no dashboard of its own, it falls through to `modDashboard::getDefaultDashboard()`.

That method looks the default up by id first and by the name `Default` second, and returns `null` when neither row exists. Nothing here guards against `null`: check the result before use.

## Syntax

``` php
modDashboard getDashboard ()
```

## Example

``` php
$dashboard = $user->getDashboard();
if ($dashboard) {
    echo $dashboard->get('name');
}
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getPrimaryGroup](extending-modx/core-model/moduser/moduser.getprimarygroup)
