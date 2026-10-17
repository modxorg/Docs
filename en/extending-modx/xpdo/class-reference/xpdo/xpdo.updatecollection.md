---
title: "xPDO.updateCollection"
description: "Update a set of columns for a collection of objects."
_old_id: "1823"
_old_uri: "2.x/class-reference/xpdo/xpdo.updatecollection"
---

## xPDO::updateCollection

Updates the columns given in `$set` for every object of `$className` that matches `$criteria`, without loading the objects into memory. Returns the number of affected rows, or `false` on failure.

## Syntax

``` php
integer|boolean updateCollection (string $className, array $set, [mixed $criteria = null])
```

## Example

``` php
$xpdo->updateCollection('modResource', array('published' => 0), array('parent' => 12));
```

## See Also

- [xPDOObject.save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "xPDOObject.save")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")