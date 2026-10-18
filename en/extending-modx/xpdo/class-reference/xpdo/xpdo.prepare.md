---
title: "xPDO.prepare"
description: "Prepare an SQL statement for execution."
_old_id: "1852"
_old_uri: "2.x/class-reference/xpdo/xpdo.prepare"
---

## xPDO::prepare

Prepares an SQL statement for execution and returns a `PDOStatement` object, or `false` on failure. Bind parameters to the statement before executing it.

## Syntax

``` php
\PDOStatement|boolean prepare (string $statement, [array $driver_options = array()])
```

## Example

``` php
$stmt = $xpdo->prepare('SELECT * FROM my_table WHERE id = :id');
$stmt->bindValue(':id', 42, PDO::PARAM_INT);
$stmt->execute();
```

## See Also

- [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
- [xPDO.exec](extending-modx/xpdo/class-reference/xpdo/xpdo.exec "xPDO.exec")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")