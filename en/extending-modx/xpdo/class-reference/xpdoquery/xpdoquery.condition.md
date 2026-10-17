---
title: "xPDOQuery.condition"
description: "Add a condition to the query at a given target."
_old_id: "1880"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.condition"
---

## xPDOQuery::condition

Adds a condition to the query at a given target (`where`, `having` or `on`). It is the low-level method behind [where()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where") and [having()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.having "xPDOQuery.having"); prefer those unless you need to target a specific clause.

## Syntax

``` php
xPDOQuery condition (array &$target, [mixed $conditions = '1'], [string $conjunction = xPDOQuery::SQL_AND], [mixed $binding = null], [integer $condGroup = 0])
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->condition($query->query['where'], array('width:>' => 10));
```

## See Also

- [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")
- [xPDOQuery.having](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.having "xPDOQuery.having")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")