---
title: "xPDOManager.addIndex"
_old_id: "1894"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.addindex"
---

## xPDOManager::addIndex

Adds an index to the table of a class. The `$options` array describes the index, including its type and columns.

## Syntax

``` php
boolean addIndex (string $class, string $name, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->addIndex('MyVendor\\MyPackage\\MyModel', 'name_idx', array(
    'columns' => array('name' => array()),
    'unique' => false,
));
```

## See Also

- [removeIndex](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeindex "removeIndex")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")