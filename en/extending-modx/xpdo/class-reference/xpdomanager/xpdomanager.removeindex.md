---
title: "xPDOManager.removeIndex"
_old_id: "1895"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.removeindex"
---

## xPDOManager::removeIndex

Removes an index from the table of a class.

## Syntax

``` php
boolean removeIndex (string $class, string $name, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->removeIndex('MyVendor\\MyPackage\\MyModel', 'name_idx');
```

## See Also

- [addIndex](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addindex "addIndex")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")