---
title: "xPDO.exec"
description: "Execute an SQL statement that returns no result set."
_old_id: "1851"
_old_uri: "2.x/class-reference/xpdo/xpdo.exec"
---

## xPDO::exec

Executes an SQL statement that does not return a result set, such as `INSERT`, `UPDATE`, `DELETE` or DDL. Returns the number of affected rows, or `false` on failure.

## Syntax

``` php
integer|boolean exec (string $query)
```

## Example

``` php
$affected = $xpdo->exec("UPDATE my_table SET active = 0 WHERE id = 42");
```

## See Also

- [xPDO.prepare](extending-modx/xpdo/class-reference/xpdo/xpdo.prepare "xPDO.prepare")
- [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")