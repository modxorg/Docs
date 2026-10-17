---
title: "xPDO.getValue"
description: "Get a single value from the first row of a prepared statement."
_old_id: "1808"
_old_uri: "2.x/class-reference/xpdo/xpdo.getvalue"
---

## xPDO::getValue

Executes a prepared `PDOStatement` and returns the value of one column from the first row of the result set. This is a convenience wrapper around `PDOStatement::fetchColumn()` that also tracks query time and the executed-query count.

## Syntax

``` php
mixed getValue (\PDOStatement $stmt, [integer|null $column = null])
```

- `$stmt` — a prepared `\PDOStatement` object.
- `$column` — 0-indexed number of the column to retrieve. If omitted or `null`, the first column is fetched.

## Example

``` php
$stmt = $xpdo->prepare('SELECT COUNT(*) FROM my_table');
$count = $xpdo->getValue($stmt);
```

## See Also

- [xPDO.prepare](extending-modx/xpdo/class-reference/xpdo/xpdo.prepare "xPDO.prepare")
- [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")