---
title: "xPDO.getFKDefinition"
description: "Get the definition of an aggregate or composite relationship for a class."
_old_id: "1817"
_old_uri: "2.x/class-reference/xpdo/xpdo.getfkdefinition"
---

## xPDO::getFKDefinition

Returns the definition of a single relationship — either an aggregate or a composite — for a class, identified by its relation alias. The returned array contains `class`, `local`, `foreign`, `cardinality`, and `owner`, plus a `type` key (`aggregate` or `composite`). Returns `null` if no definition is found, and logs an error.

## Syntax

``` php
array|null getFKDefinition (string $parentClass, string $alias)
```

## Example

``` php
$def = $xpdo->getFKDefinition('modResource', 'Template');
print_r($def);
// array('class' => 'MODX\Revolution\modTemplate', 'local' => 'template',
//       'foreign' => 'id', 'cardinality' => 'one', 'owner' => 'foreign',
//       'type' => 'aggregate')
```

## See Also

- [xPDO.getAggregates](extending-modx/xpdo/class-reference/xpdo/xpdo.getaggregates "xPDO.getAggregates")
- [xPDO.getComposites](extending-modx/xpdo/class-reference/xpdo/xpdo.getcomposites "xPDO.getComposites")
- [xPDOObject.getFKDefinition](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfkdefinition "xPDOObject.getFKDefinition")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")