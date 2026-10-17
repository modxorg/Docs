---
title: "xPDO.addConnection"
description: "Add an additional connection to the connection pool."
_old_id: "1826"
_old_uri: "2.x/class-reference/xpdo/xpdo.addconnection"
---

## xPDO::addConnection

Adds a connection to the pool of connections available to the xPDO instance. The pool is used when the `xPDO::OPT_CONNECTIONS` option is set, and connections are selected according to `xPDO::OPT_CONN_INIT` and `xPDO::OPT_CONN_MUTABLE`.

## Syntax

``` php
boolean addConnection (string $dsn, [string $username = ''], [string $password = ''], [array $options = array()], [mixed $driverOptions = null])
```

## Example

``` php
$xpdo->addConnection('mysql:host=db2.example.com;dbname=archive;charset=utf8', 'user', 'pass');
```

## See Also

- [xPDO.getConnection](extending-modx/xpdo/class-reference/xpdo/xpdo.getconnection "xPDO.getConnection")
- [Database Connections](extending-modx/xpdo/create-xpdo-instance/connections "Database Connections")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")