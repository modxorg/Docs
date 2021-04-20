---
title: "xPDO.getTableName"
_old_id: "1248"
_old_uri: "2.x/class-reference/xpdo/xpdo.gettablename"
---

## xPDO::getTableName

Gets the actual run-time table name from a specified class name.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getTableName()>

``` php
string getTableName (string $className, [boolean $includeDb = false])
```

## Example

Output the table name for the Box object with a table name of "boxes":

``` php
echo $xpdo->getTableName('Box');
```

## See Also

- [xPDO](extending-modx/xpdo "xPDO")
