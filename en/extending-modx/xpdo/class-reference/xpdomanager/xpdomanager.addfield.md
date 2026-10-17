---
title: "xPDOManager.addField"
_old_id: "1891"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.addfield"
---

## xPDOManager::addField

Adds a column to the table of a class. The `$options` array describes the column; see `getColumnDef()` in the driver manager for the accepted keys.

## Syntax

``` php
boolean addField (string $class, string $name, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->addField('MyVendor\\MyPackage\\MyModel', 'subtitle', array(
    'dbtype' => 'varchar',
    'precision' => '255',
    'phptype' => 'string',
    'null' => true,
));
```

## See Also

- [alterField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.alterfield "alterField")
- [removeField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removefield "removeField")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")