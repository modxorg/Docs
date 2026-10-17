---
title: "xPDOQuery.command"
description: "Set the SQL command (SELECT, UPDATE or DELETE) for the query."
_old_id: "1876"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.command"
---

## xPDOQuery::command

Sets the SQL command the query will execute. Valid values are `SELECT` (the default), `UPDATE` and `DELETE`. For `UPDATE` and `DELETE` the class alias is reset to the table name, because those statements do not use column aliases.

## Syntax

``` php
xPDOQuery command ([string $command = 'SELECT'])
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->command('DELETE');
$query->where(array('width:<' => 10));
$xpdo->exec($query->toSQL());
```

## See Also

- [xPDOQuery.set](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.set "xPDOQuery.set")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")