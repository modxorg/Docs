---
title: "modResource.isMember"
_old_id: "1718"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modresource/modresource.ismember"
description: "Check whether a Resource belongs to one or more Resource Groups"
---

## modResource::isMember

Checks whether a Resource belongs to one or more Resource Groups.

## Syntax

``` php
boolean isMember (string|array $groups [, boolean $matchAll = false])
```

| Parameter | Description |
| --- | --- |
| `$groups` | Resource Group name or an array of Resource Group names |
| `$matchAll` | `true` — require membership in every group of the array; `false` (default) — membership in any one group is enough. No effect when `$groups` is a single string. |

## Example

Get a Resource object:

``` php
$resource = $modx->getObject('modResource', array('id' => 2));
```

Check membership in the 'Marketing' Resource Group:

``` php
$resource->isMember('Marketing');
```

Check membership in either the 'Marketing' or the 'Finances' Resource Group:

``` php
$resource->isMember(array('Marketing', 'Finances'));
```

Check membership in both Resource Groups at once:

``` php
$resource->isMember(array('Marketing', 'Finances'), true);
```

## See Also

- [modResource](extending-modx/core-model/modresource)
