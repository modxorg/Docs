---
title: "getPrimaryKey"
_old_id: "1866"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getprimarykey"
---

## xPDOObject::getPrimaryKey

Returns the value of the primary key field of the object, or an array of values for a compound primary key.

For a compound primary key, when any part is empty or `null` and that field has a `default` in the field metadata, the default is written back into the object's fields and used. When the field allows `null`, `null` is used. Otherwise the method returns `null` instead of an array.

## Syntax

``` php
mixed getPrimaryKey ([boolean $validateCompound = true])
```

- `$validateCompound` — when true (the default), an incomplete compound primary key with no allowed default returns `null`; when false, the partial values are returned as an array.

## Example

``` php
$resource = $modx->getObject('modResource', 42);
echo $resource->getPrimaryKey();
// 42
```

## See Also

- [getPK](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpk "getPK")
- [getPKType](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getpktype "getPKType")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")