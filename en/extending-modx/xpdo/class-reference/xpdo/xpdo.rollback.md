---
title: "xPDO.rollBack"
description: "Roll back the current transaction."
_old_id: "1824"
_old_uri: "2.x/class-reference/xpdo/xpdo.rollback"
---

## xPDO::rollBack

Rolls back the current transaction. Returns `false` if no connection is available, otherwise the result of the underlying `PDO::rollBack()`.

## Syntax

``` php
boolean rollBack ()
```

## Example

``` php
$xpdo->beginTransaction();
try {
    // ... write operations ...
    $xpdo->commit();
} catch (Exception $e) {
    $xpdo->rollBack();
}
```

## See Also

- [xPDO.beginTransaction](extending-modx/xpdo/class-reference/xpdo/xpdo.begintransaction "xPDO.beginTransaction")
- [xPDO.commit](extending-modx/xpdo/class-reference/xpdo/xpdo.commit "xPDO.commit")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")