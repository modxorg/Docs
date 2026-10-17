---
title: "xPDO.getIndexMeta"
description: "Get the index metadata for a class."
_old_id: "1835"
_old_uri: "2.x/class-reference/xpdo/xpdo.getindexmeta"
---

## xPDO::getIndexMeta

Returns the index metadata for a class, keyed by index name. Each entry lists the indexed columns and whether the index is primary and/or unique.

## Syntax

``` php
array|null getIndexMeta (string $className)
```

## Example

``` php
$indexes = $xpdo->getIndexMeta('modResource');
```

## See Also

- [xPDO.getFieldMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldmeta "xPDO.getFieldMeta")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")