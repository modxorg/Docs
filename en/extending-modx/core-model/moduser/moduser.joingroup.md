---
title: "modUser.joinGroup"
description: "Add the User to a User Group, optionally with a Role and a rank"
---

## modUser::joinGroup

Looks the group up first and refuses with `false` (and an error log entry) when it does not exist; a missing role does the same. An empty `$roleId` leaves the role at its column default.

`$rank` defaults to the number of membership rows the User already has. An existing membership returns `true` and changes nothing, so a member's role and rank are never overwritten. A successful insert clears the cached group id and name lists in the session.

## Syntax

``` php
boolean joinGroup (mixed $groupId [, mixed $roleId = null [, integer $rank = null]])
```

- `$groupId` _(mixed)_ Group name (string) or group id to join.
- `$roleId` _(mixed)_ Role name (string) or role id, by default `null`.
- `$rank` _(integer)_ Membership rank, by default `null`.

## Example

``` php
$user->joinGroup('staff', 'Member');
$user->joinGroup(5, null, 3);
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.leaveGroup](extending-modx/core-model/moduser/moduser.leavegroup)
- [User Groups](building-sites/client-proofing/security/user-groups)
