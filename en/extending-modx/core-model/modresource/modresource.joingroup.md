---
title: "modResource.joinGroup"
description: "Add a Resource to a Resource Group"
---

## modResource.joinGroup

Adds the Resource to a Resource Group by saving a `modResourceGroupResource` row. A plain `$resourceGroupPk` value is matched by `id` when it is an integer, and by `name` otherwise.

Pass `$byName` when a numeric-looking group name arrives as an integer, so the lookup is forced to the `name` column. Returns `false` when the group does not exist or the Resource is already a member — both cases are written to the error log. No events are fired here; the processors invoke `OnResourceAddToResourceGroup` themselves.

## Syntax

``` php
boolean joinGroup ($resourceGroupPk [, boolean $byName = false])
```

- `$resourceGroupPk` _(int|string|modResourceGroup)_ ID, name or object of the group
- `$byName` _(boolean)_ treat the argument as the group name even when it is an integer, by default `false`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->joinGroup('staff');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.leaveGroup](extending-modx/core-model/modresource/modresource.leavegroup)
- [modResource.isMember](extending-modx/core-model/modresource/modresource.ismember)
