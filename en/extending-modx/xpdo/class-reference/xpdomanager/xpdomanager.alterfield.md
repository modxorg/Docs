---
title: "xPDOManager.alterField"
_old_id: "1892"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.alterfield"
---

## xPDOManager::alterField

Alters an existing column of a class's table. The `$options` array describes the new column definition.

## Syntax

``` php
boolean alterField (string $class, string $name, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->alterField('MyVendor\\MyPackage\\MyModel', 'subtitle', array(
    'dbtype' => 'varchar',
    'precision' => '512',
    'phptype' => 'string',
    'null' => true,
));
```

## See Also

- [addField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addfield "addField")
- [removeField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removefield "removeField")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")