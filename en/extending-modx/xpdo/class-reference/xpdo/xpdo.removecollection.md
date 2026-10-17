---
title: "xPDO.removeCollection"
description: "Remove a collection of objects from the database."
_old_id: "1822"
_old_uri: "2.x/class-reference/xpdo/xpdo.removecollection"
---

## xPDO::removeCollection

Removes every object of `$className` that matches `$criteria`. Returns the number of removed rows, or `false` on failure.

## Syntax

``` php
integer|boolean removeCollection (string $className, mixed $criteria)
```

## Example

``` php
$xpdo->removeCollection('modResource', array('parent' => 12));
```

## See Also

- [xPDO.removeObject](extending-modx/xpdo/class-reference/xpdo/xpdo.removeobject "xPDO.removeObject")
- [xPDOObject.remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove "xPDOObject.remove")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")