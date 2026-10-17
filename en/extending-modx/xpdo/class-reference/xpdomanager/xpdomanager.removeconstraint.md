---
title: "xPDOManager.removeConstraint"
_old_id: "1897"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.removeconstraint"
---

## xPDOManager::removeConstraint

Removes a foreign key constraint from the table of a class.

## Syntax

``` php
boolean removeConstraint (string $class, string $name, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->removeConstraint('MyVendor\\MyPackage\\MyModel', 'owner_fk');
```

## See Also

- [addConstraint](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addconstraint "addConstraint")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")