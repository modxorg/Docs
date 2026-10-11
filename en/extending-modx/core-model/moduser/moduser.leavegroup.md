---
title: "modUser.leaveGroup"
description: "Remove the User from a User Group"
---

## modUser::leaveGroup

Deletes the `modUserGroupMember` row that links this User to the group.

Leaving a group the User is not in is logged as an error, and the method returns `false`. A successful removal clears the cached group id and name lists in the session, so the next `getUserGroups()` call sees the change.

## Syntax

``` php
boolean leaveGroup (mixed $groupId)
```

- `$groupId` _(mixed)_ Group name (string) or group id to leave.

## Example

``` php
$user->leaveGroup('staff');
$user->leaveGroup(5);
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.joinGroup](extending-modx/core-model/moduser/moduser.joingroup)
- [User Groups](building-sites/client-proofing/security/user-groups)
