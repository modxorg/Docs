---
title: "xPDO.getTableClass"
description: "Get the database table name for a class."
_old_id: "1832"
_old_uri: "2.x/class-reference/xpdo/xpdo.gettableclass"
---

## xPDO::getTableClass

Returns the name of the database table associated with a class. Returns `null` if the class has no table defined.

## Syntax

``` php
string|null getTableClass (string $className)
```

## Example

``` php
$table = $xpdo->getTableClass('modResource');
// 'site_content'
```

## See Also

- [xPDO.getTableName](extending-modx/xpdo/class-reference/xpdo/xpdo.gettablename "xPDO.getTableName")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")