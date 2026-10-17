---
title: "getGraph"
_old_id: "1868"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getgraph"
---

## xPDOObject::getGraph

Loads a graph of related objects onto the current object. The `$graph` argument controls how much is loaded:

- `true` (default) — the entire relation graph, up to the maximum depth.
- an integer — related objects up to that depth.
- a JSON string — the graph definition, as used by `getCollectionGraph()`.
- an array — the graph definition in array form.

Returns the loaded graph, or `false` if nothing was loaded.

## Syntax

``` php
array|boolean getGraph ([boolean|string|array|integer $graph = true], [mixed $criteria = null], [boolean|integer $cacheFlag = true])
```

## Example

``` php
$resource = $modx->getObject('modResource', 42);
$graph = $resource->getGraph('{"Template":{},"TemplateVarResources":{"TemplateVar":{}}}');
```

## See Also

- [xPDO.getGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getgraph "xPDO.getGraph")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")