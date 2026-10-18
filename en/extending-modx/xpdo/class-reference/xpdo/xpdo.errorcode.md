---
title: "xPDO.errorCode"
description: "Get the SQLSTATE error code of the last operation."
_old_id: "1853"
_old_uri: "2.x/class-reference/xpdo/xpdo.errorcode"
---

## xPDO::errorCode

Returns the SQLSTATE error code associated with the last database operation, as defined by the PDO specification. Returns `null` when no error has occurred.

## Syntax

``` php
string|null errorCode ()
```

## Example

``` php
$code = $xpdo->errorCode();
```

## See Also

- [xPDO.errorInfo](extending-modx/xpdo/class-reference/xpdo/xpdo.errorinfo "xPDO.errorInfo")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")