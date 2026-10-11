---
title: "modUser.isMember"
_old_id: "1347"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/moduser/moduser.ismember"
description: "Check whether a User belongs to one or more User Groups"
---

## modUser::isMember

Checks whether a User belongs to one or more User Groups.

## Syntax

``` php
boolean isMember (string|array $groups [, boolean $matchAll = false])
```

| Parameter | Description |
| --- | --- |
| `$groups` | User Group name or an array of User Group names |
| `$matchAll` | `true` — require membership in every group of the array; `false` (default) — membership in any one group is enough. No effect when `$groups` is a single string. |

## Example

Get a User object:

``` php
$user = $modx->getObject('modUser', array('username' => 'boss'));
```

Check membership in the 'Staff' User Group:

``` php
$user->isMember('Staff');
```

Check membership in either the 'Staff' or the 'Investors' User Group:

``` php
$user->isMember(array('Staff','Investors'));
```

Check membership in both User Groups at once:

``` php
$user->isMember(array('Staff','Investors'), true);
```

## See Also

- [modUser](extending-modx/core-model/moduser "modUser")
