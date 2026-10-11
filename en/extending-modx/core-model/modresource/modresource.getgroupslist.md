---
title: "modResource.getGroupsList"
description: "List Resource Groups with a membership flag for a Resource"
---

## modResource.getGroupsList

Returns a `collection` of every Resource Group in the system plus the `total` count for a pager, from the static `listGroups()`. Each group carries an `access` field: `1` when this Resource is a member, `0` otherwise.

## Syntax

``` php
array getGroupsList ([array $sort = array('id' => 'ASC') [, int $limit = 0 [, int $offset = 0]]])
```

- `$sort` _(array)_ sort columns in `column => direction` format, by default `array('id' => 'ASC')`
- `$limit` _(int)_ maximum rows to return, `0` disables the limit, by default `0`
- `$offset` _(int)_ row offset for a limited collection, by default `0`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$result = $resource->getGroupsList(array('name' => 'ASC'), 20, 0);
foreach ($result['collection'] as $group) {
    echo $group->get('name') . ': ' . $group->get('access');
}
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getResourceGroupNames](extending-modx/core-model/modresource/modresource.getresourcegroupnames)
