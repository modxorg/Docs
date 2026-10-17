---
title: "xPDO.getPDOType"
description: "Get the PDO parameter type for a PHP value."
_old_id: "1845"
_old_uri: "2.x/class-reference/xpdo/xpdo.getpdotype"
---

## xPDO::getPDOType

Returns the `PDO` parameter type constant that corresponds to a PHP value — for example `PDO::PARAM_INT` for integers, `PDO::PARAM_STR` for strings, and `PDO::PARAM_NULL` for `null`.

## Syntax

``` php
integer getPDOType (mixed $value)
```

## Example

``` php
$type = $xpdo->getPDOType(42);
// PDO::PARAM_INT
```

## See Also

- [xPDO.parseBindings](extending-modx/xpdo/class-reference/xpdo/xpdo.parsebindings "xPDO.parseBindings")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")