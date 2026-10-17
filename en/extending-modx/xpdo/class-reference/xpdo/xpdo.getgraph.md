---
title: "xPDO.getGraph"
description: "Build a graph of related classes for a class."
_old_id: "1816"
_old_uri: "2.x/class-reference/xpdo/xpdo.getgraph"
---

## xPDO::getGraph

Walks the aggregate and composite relationships of a class and returns a nested graph of related classes, up to a given depth. This is the map behind `getCollectionGraph()` and `getGraph()` on an object.

## Syntax

``` php
array getGraph (string $className, [integer $depth = 3], [array &$parents = array()], [array &$visited = array()])
```

- `$className` — the class to start from.
- `$depth` — how many levels of relations to include.
- `$parents` / `$visited` — internal bookkeeping used to prevent cycles.

## Example

``` php
$graph = $xpdo->getGraph('modResource', 2);
print_r($graph);
```

## See Also

- [xPDOObject.getGraph](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getgraph "xPDOObject.getGraph")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")