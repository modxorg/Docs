---
title: "xPDO.getTableMeta"
description: "Get the table metadata for a class."
_old_id: "1833"
_old_uri: "2.x/class-reference/xpdo/xpdo.gettablemeta"
---

## xPDO::getTableMeta

Returns the raw table metadata for a class, including the table name, engine, and any package-specific prefix recorded for it.

## Syntax

``` php
array|null getTableMeta (string $className)
```

## Example

``` php
$meta = $xpdo->getTableMeta('modResource');
```

## See Also

- [xPDO.getTableClass](extending-modx/xpdo/class-reference/xpdo/xpdo.gettableclass "xPDO.getTableClass")
- [xPDO.getFieldMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldmeta "xPDO.getFieldMeta")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")