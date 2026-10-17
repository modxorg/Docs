---
title: "xPDO.getComposites"
description: "Get the composite foreign key relationships defined for a class."
_old_id: "1815"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcomposites"
---

## xPDO::getComposites

Returns the composite relationship definitions for a class, keyed by relation alias. A composite relationship points to related objects that hold the foreign key (a one-to-many relationship where the related objects are owned by the current class). Composite relationships are the ones cascaded on `remove()`.

## Syntax

``` php
array getComposites (string $className)
```

## Example

``` php
$composites = $xpdo->getComposites('modResource');
print_r($composites['Children']);
```

## See Also

- [xPDO.getAggregates](extending-modx/xpdo/class-reference/xpdo/xpdo.getaggregates "xPDO.getAggregates")
- [xPDO.getFKDefinition](extending-modx/xpdo/class-reference/xpdo/xpdo.getfkdefinition "xPDO.getFKDefinition")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")