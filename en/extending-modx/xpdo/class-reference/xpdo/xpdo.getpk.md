---
title: "xPDO.getPK"
description: "Get the primary key field name(s) for a class."
_old_id: "1810"
_old_uri: "2.x/class-reference/xpdo/xpdo.getpk"
---

## xPDO::getPK

Returns the name of the field that represents the primary key of a class, an array of key names for a compound primary key, or `null` if no primary key is defined.

## Syntax

``` php
mixed getPK (string $className)
```

## Example

``` php
$pk = $xpdo->getPK('modResource');
// 'id'
```

## See Also

- [xPDO.getPKType](extending-modx/xpdo/class-reference/xpdo/xpdo.getpktype "xPDO.getPKType")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")