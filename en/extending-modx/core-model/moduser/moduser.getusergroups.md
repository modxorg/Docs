---
title: "modUser.getUserGroups"
description: "List the User Group ids the User belongs to"
---

## modUser::getUserGroups

Returns the ids of the `modUserGroup` records joined through `modUserGroupMembers` for this User. Ids, not names: `getUserGroupNames()` returns the names for the same membership set.

Results are cached in the session under `modx.user.{id}.userGroups` and read only when this object is the currently logged in User. Any other User is queried from the database on every call, and the cache entry is rewritten with that result.

## Syntax

``` php
array getUserGroups ()
```

## Example

``` php
foreach ($user->getUserGroups() as $groupId) {
    echo $groupId;
}
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getUserGroupNames](extending-modx/core-model/moduser/moduser.getusergroupnames)
- [modUser.isMember](extending-modx/core-model/moduser/moduser.ismember)
