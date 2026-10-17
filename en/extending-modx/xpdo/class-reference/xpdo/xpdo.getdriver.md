---
title: "xPDO.getDriver"
description: "Get the name of the current PDO driver."
_old_id: "1838"
_old_uri: "2.x/class-reference/xpdo/xpdo.getdriver"
---

## xPDO::getDriver

Returns the name of the PDO driver currently in use by the xPDO instance, for example `mysql`.

## Syntax

``` php
string|null getDriver ()
```

## Example

``` php
$driver = $xpdo->getDriver();
```

## See Also

- [xPDO.getConnection](extending-modx/xpdo/class-reference/xpdo/xpdo.getconnection "xPDO.getConnection")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")