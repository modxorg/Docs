---
title: "xPDO.getFields"
_old_id: "1242"
_old_uri: "2.x/class-reference/xpdo/xpdo.getfields"
---

## xPDO::getFields

Gets a list of fields (or columns) for an object by class name.

This includes default values for each field and is used by the objects themselves to build their initial attributes based on class inheritance.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getFields>

``` php 
array getFields (string $className)
```

## Example

Get a list of fields for the Box object, which has 3 fields: id, width and height:

``` php 
$fields = $xpdo->getFields('Box');
print_r($fields); // prints: Array ([id] => 1, [width] => 10, [height] => 23)
```

## See Also

- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")