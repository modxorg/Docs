---
title: "xPDOManager.removeField"
_old_id: "1893"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.removefield"
---

## xPDOManager::removeField

Removes a column from the table of a class.

## Syntax

``` php
boolean removeField (string $class, string $name, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->removeField('MyVendor\\MyPackage\\MyModel', 'subtitle');
```

## See Also

- [addField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addfield "addField")
- [alterField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.alterfield "alterField")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")