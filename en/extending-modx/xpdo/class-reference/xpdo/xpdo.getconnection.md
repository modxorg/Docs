---
title: "xPDO.getConnection"
description: "Get a connection from the connection pool."
_old_id: "1827"
_old_uri: "2.x/class-reference/xpdo/xpdo.getconnection"
---

## xPDO::getConnection

Returns the current connection to the database, selecting one from the pool if the `xPDO::OPT_CONNECTIONS` option is configured. Returns the underlying `PDO` instance, or `null` if no connection is available.

## Syntax

``` php
\PDO|null getConnection ([array $options = array()])
```

## Example

``` php
$pdo = $xpdo->getConnection();
```

## See Also

- [xPDO.addConnection](extending-modx/xpdo/class-reference/xpdo/xpdo.addconnection "xPDO.addConnection")
- [xPDO.connect](extending-modx/xpdo/class-reference/xpdo/xpdo.connect "xPDO.connect")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")