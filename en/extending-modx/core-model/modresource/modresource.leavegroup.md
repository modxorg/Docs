---
title: "modResource.leaveGroup"
description: "Remove a Resource from a Resource Group"
---

## modResource.leaveGroup

Removes the Resource from a Resource Group by deleting the `modResourceGroupResource` row. Unlike `joinGroup()`, there is no `$byName` flag: an integer is matched against `id`, anything else against `name`.

Returns `false` when the group is not found or the Resource is not a member; both cases are logged. Otherwise it returns the result of deleting the membership row. The `OnResourceRemoveFromResourceGroup` event is invoked by processors, not by this method.

## Syntax

``` php
boolean leaveGroup ($resourceGroupPk)
```

- `$resourceGroupPk` _(int|string|modResourceGroup)_ ID, name or object of the group

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->leaveGroup('staff');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.joinGroup](extending-modx/core-model/modresource/modresource.joingroup)
- [modResource.getResourceGroupNames](extending-modx/core-model/modresource/modresource.getresourcegroupnames)
