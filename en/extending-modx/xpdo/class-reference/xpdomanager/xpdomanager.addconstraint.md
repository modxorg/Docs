---
title: "xPDOManager.addConstraint"
_old_id: "1896"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.addconstraint"
---

## xPDOManager::addConstraint

Adds a foreign key constraint to the table of a class. The `$options` array describes the constraint.

## Syntax

``` php
boolean addConstraint (string $class, string $name, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->addConstraint('MyVendor\\MyPackage\\MyModel', 'owner_fk', array(
    'foreign' => 'id',
    'local' => 'owner_id',
    'constraint' => 'Owner',
));
```

## See Also

- [removeConstraint](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeconstraint "removeConstraint")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")