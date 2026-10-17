---
title: "xPDO.parseDSN"
description: "Parse a DSN string into its component parts."
_old_id: "1825"
_old_uri: "2.x/class-reference/xpdo/xpdo.parsedsn"
---

## xPDO::parseDSN

Parses a PDO DSN string into an associative array with `driver`, `host`, `database`, and `charset` keys. This is useful because some xPDO methods, such as `xPDOManager::createSourceContainer()`, expect the parsed array rather than the raw DSN string.

## Syntax

``` php
array|null parseDSN (string $string)
```

## Example

``` php
$dsn = 'mysql:host=localhost;dbname=mydb;charset=utf8';
$parts = xPDO::parseDSN($dsn);
// array('driver' => 'mysql', 'host' => 'localhost',
//       'database' => 'mydb', 'charset' => 'utf8')
```

## See Also

- [xPDOManager.createSourceContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createsourcecontainer "xPDOManager.createSourceContainer")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")