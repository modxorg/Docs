---
title: "xPDO.getFieldAliases"
description: "Get the field aliases defined for a class."
_old_id: "1813"
_old_uri: "2.x/class-reference/xpdo/xpdo.getfieldaliases"
---

## xPDO::getFieldAliases

Returns the field alias map for a class, keyed by alias name. Each value is the field the alias points to. Field aliases are declared with `<alias key="..." field="..."/>` in the schema and let you read a field under a different name.

## Syntax

``` php
array getFieldAliases (string $className)
```

## Example

``` php
$aliases = $xpdo->getFieldAliases('sfStore');
// array('postalcode' => 'zip')
```

## See Also

- [xPDO.getFieldMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldmeta "xPDO.getFieldMeta")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")