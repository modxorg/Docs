---
title: "xPDO.getFieldMeta"
description: "Get the metadata of the fields defined for a class."
_old_id: "1812"
_old_uri: "2.x/class-reference/xpdo/xpdo.getfieldmeta"
---

## xPDO::getFieldMeta

Returns the field metadata map for a class, keyed by field name. Each entry describes the database type (`dbtype`), the PHP type (`phptype`), nullability, default value, and index information for the field.

## Syntax

``` php
array getFieldMeta (string $className, [boolean $includeExtended = false])
```

- `$className` — the class to look up.
- `$includeExtended` — when true, fields inherited from parent classes are included.

## Example

``` php
$meta = $xpdo->getFieldMeta('modResource');
print_r($meta['pagetitle']);
```

## See Also

- [xPDO.getFieldAliases](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldaliases "xPDO.getFieldAliases")
- [xPDO.getFields](extending-modx/xpdo/class-reference/xpdo/xpdo.getfields "xPDO.getFields")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")