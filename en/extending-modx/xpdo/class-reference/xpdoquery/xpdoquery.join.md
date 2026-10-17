---
title: "xPDOQuery.join"
description: "Add a join clause with an explicit join type."
_old_id: "1882"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.join"
---

## xPDOQuery::join

Adds a join clause to the query with an explicit join type. The dedicated methods [innerJoin()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin"), [leftJoin()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin "xPDOQuery.leftJoin") and [rightJoin()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.rightjoin "xPDOQuery.rightJoin") are shorter forms of this method.

## Syntax

``` php
xPDOQuery join (string $class, [string $alias = ''], [string $type = xPDOQuery::SQL_JOIN_CROSS], [mixed $conditions = array()], [string $conjunction = xPDOQuery::SQL_AND], [mixed $binding = null], [integer $condGroup = 0])
```

`$type` accepts the class constants `SQL_JOIN_CROSS`, `SQL_JOIN_LEFT`, `SQL_JOIN_RIGHT`, `SQL_JOIN_NATURAL_LEFT`, `SQL_JOIN_NATURAL_RIGHT` and `SQL_JOIN_STRAIGHT`.

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->join('Owner', 'Owner', xPDOQuery::SQL_JOIN_LEFT, array('Owner.id:=' => 'Box.owner_id'));
```

## See Also

- [xPDOQuery.innerJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.innerjoin "xPDOQuery.innerJoin")
- [xPDOQuery.leftJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin "xPDOQuery.leftJoin")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")