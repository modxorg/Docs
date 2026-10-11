---
title: "modUser.getUserGroupSettings"
description: "Collect modUserGroupSetting values for every group of the User"
---

## modUser::getUserGroupSettings

Collects `modUserGroupSetting` values for the groups the User belongs to, not from the User row.

Rows arrive ordered by group rank, then member rank; a later row overwrites an earlier one for the same key. `primary_group` settings are collected separately and merged last, so they win over everything else. `getSettings()` puts the User's own `UserSettings` on top of the result.

## Syntax

``` php
array getUserGroupSettings ()
```

## Example

``` php
$groupSettings = $user->getUserGroupSettings();
$allSettings   = $user->getSettings();
```

## See Also

- [modUser](extending-modx/core-model/moduser)
- [modUser.getSettings](extending-modx/core-model/moduser/moduser.getsettings)
