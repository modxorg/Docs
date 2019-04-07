---
title: "xPDO.getManager"
_old_id: "1244"
_old_uri: "2.x/class-reference/xpdo/xpdo.getmanager"
---

## xPDO::getManager

Gets the manager class for this xPDO connection.

The manager class can perform operations such as creating or altering table structures, creating data containers, generating custom persistence classes, and other advanced operations that do not need to be loaded frequently.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getManager>

``` php
object|null getManager ()
```

## Example

``` php
$manager = $xpdo->getManager();
```

## See Also

- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")
- [xPDO](extending-modx/xpdo "xPDO")