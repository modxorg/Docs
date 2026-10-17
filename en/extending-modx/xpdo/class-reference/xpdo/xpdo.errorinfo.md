---
title: "xPDO.errorInfo"
description: "Get the error information of the last operation."
_old_id: "1854"
_old_uri: "2.x/class-reference/xpdo/xpdo.errorinfo"
---

## xPDO::errorInfo

Returns an array of error information about the last database operation: the SQLSTATE code, the driver-specific error code, and the driver-specific error message. Returns an empty array when no error has occurred.

## Syntax

``` php
array errorInfo ()
```

## Example

``` php
print_r($xpdo->errorInfo());
```

## See Also

- [xPDO.errorCode](extending-modx/xpdo/class-reference/xpdo/xpdo.errorcode "xPDO.errorCode")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")