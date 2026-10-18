---
title: "xPDOQuery.set"
description: "Set column values for an UPDATE query."
_old_id: "1878"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.set"
---

## xPDOQuery::set

Sets the values to be written by an `UPDATE` query. The query must be in `UPDATE` mode (see [command()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.command "xPDOQuery.command")); values are combined with the `WHERE` conditions built by `where()`.

## Syntax

``` php
xPDOQuery set (array $values)
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->command('UPDATE');
$query->set(array('color' => 'blue'));
$query->where(array('width:<' => 10));
$xpdo->exec($query->toSQL());
```

## See Also

- [xPDOQuery.command](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.command "xPDOQuery.command")
- [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")