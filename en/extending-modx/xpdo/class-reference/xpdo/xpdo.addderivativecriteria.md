---
title: "xPDO.addDerivativeCriteria"
description: "Add criteria that filters derivative classes by class key."
_old_id: "1820"
_old_uri: "2.x/class-reference/xpdo/xpdo.addderivativecriteria"
---

## xPDO::addDerivativeCriteria

Adds a `class_key` condition to criteria for classes that use single-table inheritance. When a parent class is marked `inherit="single"`, its derivative classes are stored in the same table and distinguished by `class_key`; this method ensures queries against the parent only return rows of the requested class.

## Syntax

``` php
mixed addDerivativeCriteria (string $className, mixed $criteria)
```

## Example

``` php
$criteria = $xpdo->addDerivativeCriteria('modResource', array('parent' => 12));
$resources = $xpdo->getCollection('modResource', $criteria);
```

## See Also

- [xPDO.newQuery](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")