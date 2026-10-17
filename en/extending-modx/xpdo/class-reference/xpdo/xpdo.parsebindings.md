---
title: "xPDO.parseBindings"
description: "Replace placeholders in a SQL string with bound values."
_old_id: "1846"
_old_uri: "2.x/class-reference/xpdo/xpdo.parsebindings"
---

## xPDO::parseBindings

Replaces named or positional placeholders in a SQL string with their corresponding values from a bindings array, quoting values as needed. Used internally to build the final SQL from a query with bindings.

## Syntax

``` php
string parseBindings (string $sql, array $bindings)
```

## Example

``` php
$sql = $xpdo->parseBindings('SELECT * FROM my_table WHERE id = :id', array(':id' => 42));
```

## See Also

- [xPDO.getPDOType](extending-modx/xpdo/class-reference/xpdo/xpdo.getpdotype "xPDO.getPDOType")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")