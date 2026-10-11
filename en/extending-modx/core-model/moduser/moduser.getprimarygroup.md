---
title: "modUser.getPrimaryGroup"
description: "Return the primary modUserGroup of the User, with a rank fallback"
---

## modUser::getPrimaryGroup

Returns `null` outright when the User is not authenticated in the current context, so the method is useless on a session-less object.

Otherwise it reads the `PrimaryGroup` aggregate behind the `primary_group` column. Without one it falls back to the membership row with the lowest rank, and stays `null` when the User is in no group at all. `getDashboard()` starts from this method.

## Syntax

``` php
modUserGroup|null getPrimaryGroup ()
```

## Example

``` php
$group = $user->getPrimaryGroup();
if ($group) {
    echo $group->get('name');
}
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getDashboard](extending-modx/core-model/moduser/moduser.getdashboard)
- [modUser.getUserGroups](extending-modx/core-model/moduser/moduser.getusergroups)
