---
title: "modUser.getUserGroupNames"
description: "List the User Group names the User belongs to"
---

## modUser::getUserGroupNames

Returns the `name` of every group the User belongs to; `getUserGroups()` returns the ids of the same membership set. `isMember()` compares group names against this list.

The session cache under `modx.user.{id}.userGroupNames` is read only for the currently logged in User — the same rule as in `getUserGroups()`. Every other User is queried from the database.

## Syntax

``` php
array getUserGroupNames ()
```

## Example

``` php
foreach ($user->getUserGroupNames() as $name) {
    echo $name;
}
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getUserGroups](extending-modx/core-model/moduser/moduser.getusergroups)
- [modUser.isMember](extending-modx/core-model/moduser/moduser.ismember)
