---
title: "xPDO.removeObject"
description: "Remove an object from the database."
_old_id: "1821"
_old_uri: "2.x/class-reference/xpdo/xpdo.removeobject"
---

## xPDO::removeObject

Instantiates the class named by `$className` and removes it using the given primary key criteria. Returns `true` on success, `false` on failure.

## Syntax

``` php
boolean removeObject (string $className, mixed $criteria)
```

## Example

``` php
$xpdo->removeObject('modResource', 42);
```

## See Also

- [xPDO.removeCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.removecollection "xPDO.removeCollection")
- [xPDOObject.remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove "xPDOObject.remove")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")