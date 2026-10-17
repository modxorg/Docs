---
title: "xPDO.getPKType"
description: "Get the PHP type of the primary key field(s) for a class."
_old_id: "1811"
_old_uri: "2.x/class-reference/xpdo/xpdo.getpktype"
---

## xPDO::getPKType

Returns the `phptype` of the primary key field for a class, or an array of types for a compound primary key. Returns `null` if no primary key is found.

## Syntax

``` php
mixed getPKType (string $className, [mixed $pk = false])
```

- `$className` — the class to look up.
- `$pk` — an optional specific primary key column (or columns) to get the type(s) for. When omitted, the type is resolved from the class's primary key.

## Example

``` php
$type = $xpdo->getPKType('modResource');
// 'integer'
```

## See Also

- [xPDO.getPK](extending-modx/xpdo/class-reference/xpdo/xpdo.getpk "xPDO.getPK")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")