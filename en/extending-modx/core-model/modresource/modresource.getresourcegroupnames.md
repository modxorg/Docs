---
title: "modResource.getResourceGroupNames"
description: "List the names of the Resource Groups a Resource belongs to"
---

## modResource.getResourceGroupNames

Returns the names of the Resource Groups the Resource is a member of, as a plain array of strings. The group collection is fetched through `getCollectionGraph()` on the `ResourceGroupResources` relation.

`isMember()` and the membership check inside `joinGroup()` are both built on this method.

## Syntax

``` php
array getResourceGroupNames ()
```

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$names = $resource->getResourceGroupNames();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.isMember](extending-modx/core-model/modresource/modresource.ismember)
- [modResource.getGroupsList](extending-modx/core-model/modresource/modresource.getgroupslist)
