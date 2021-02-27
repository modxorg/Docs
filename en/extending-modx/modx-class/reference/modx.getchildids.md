---
title: "modX.getChildIds"
_old_id: "1061"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getchildids"
---

## modX::getChildIds

Gets all of the child resource ids for a given resource.

## Syntax

API Doc: [modX::getChildIds()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getChildIds())

``` php
array getChildIds ([integer $id = null], [integer $depth = 10], [array $options = array()])
```

## Example

Get all the children IDs for the Resource 23. Limit to 6 levels deep. Only in the web context.

``` php
$array_ids = $modx->getChildIds(23,6,array('context' => 'web'));
```

Note that when using this method in the manager (to collect input options for a TV for example), you need to define the context with the third `options` parameter as it defaults to the current context (in that scenario the manager).

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.getParentIds](extending-modx/modx-class/reference/modx.getparentids "modX.getParentIds")
