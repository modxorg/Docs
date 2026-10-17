---
title: "xPDO.getAggregates"
description: "Get the aggregate foreign key relationships defined for a class."
_old_id: "1814"
_old_uri: "2.x/class-reference/xpdo/xpdo.getaggregates"
---

## xPDO::getAggregates

Returns the aggregate relationship definitions for a class, keyed by relation alias. An aggregate relationship points to a related object whose foreign key lives on the related object (a one-to-one or one-to-many relationship where the current class is the owner).

## Syntax

``` php
array getAggregates (string $className)
```

## Example

``` php
$aggregates = $xpdo->getAggregates('modResource');
print_r($aggregates['Template']);
```

## See Also

- [xPDO.getComposites](extending-modx/xpdo/class-reference/xpdo/xpdo.getcomposites "xPDO.getComposites")
- [xPDO.getFKDefinition](extending-modx/xpdo/class-reference/xpdo/xpdo.getfkdefinition "xPDO.getFKDefinition")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")