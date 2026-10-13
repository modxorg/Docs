---
title: "modX.getParentIds"
description: "Gets all of the parent resource ids for a given resource."
_old_id: "1068"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getparentids"
---

## modX::getParentIds

Gets all of the parent resource ids for a given resource.

## Syntax

``` php
array getParentIds ([integer $id = null], [integer $height = 10], [array $options = array()] )
```

## Example

Get all of the parent IDs for the Resource with ID 23.

``` php
$parentIds = $modx->getParentIds(23);
```

Important! This method makes use of the context cache to get the parent IDs. If you don't specify the context in the options (third) parameter it will use the current context. **In a plugin or external application that is often "mgr".** When this method returns an empty array, it is most likely looking in the wrong context so you will have to specify the third parameter. Example:

``` php
$pids = $modx->getParentIds($id, 10, array('context' => 'web'));
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.getChildIds](extending-modx/modx-class/reference/modx.getchildids "modX.getChildIds")
