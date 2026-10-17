---
title: "xPDOManager.alterObjectContainer"
_old_id: "1890"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.alterobjectcontainer"
---

## xPDOManager::alterObjectContainer

Alters an existing object container (table) to match the current schema of the class. Use this after changing a field, index or constraint in your model to bring the database table in line with it.

## Syntax

``` php
boolean alterObjectContainer (string $className, [array $options = array()])
```

## Example

``` php
$manager = $xpdo->getManager();
$manager->alterObjectContainer('MyVendor\\MyPackage\\MyModel');
```

## See Also

- [createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer "createObjectContainer")
- [removeObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeobjectcontainer "removeObjectContainer")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")