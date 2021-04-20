---
title: "xPDO.newObject"
_old_id: "1251"
_old_uri: "2.x/class-reference/xpdo/xpdo.newobject"
---

## xPDO::newObject

Creates a new instance of a specified class.
All new objects created with this method are transient until [xPDOObject::save()](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "save") is called the first time and is reflected by the xPDOObject::$\_new property.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::newObject()>

``` php
object|null newObject (string $className, [array $fields = array ()])
```

## Example

Create a new Box object:

``` php
$box = $xpdo->newObject('Box');
```

Create a new Box object with the width and height already set:

``` php
$box = $xpdo->newObject('Box',array(
   'width' => 10,
   'height' => 4,
));
```

## See Also

- [Creating Objects](extending-modx/xpdo/creating-objects "Creating Objects")
- [Removing (deleting) objects](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove)
- [xPDO](extending-modx/xpdo "xPDO")
