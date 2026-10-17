---
title: "xPDOQuery.rightJoin"
description: "Adds a RIGHT JOIN clause to the query."
_old_id: "1296"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.rightjoin"
---

## xPDOQuery::rightJoin

Adds a RIGHT JOIN clause to the query. Rows of the right table are kept even when the left table has no match.

## Syntax

``` php
xPDOQuery rightJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = xPDOQuery::SQL_AND], [ $binding = null], [ $condGroup = 0])
```

## Example

Grab all Owners, including those without a Box.

``` php
$query = $xpdo->newQuery('Owner');
$query->rightJoin('Box','Box');
$owners = $xpdo->getCollection('Owner',$query);
```

When `$conditions` is omitted, xPDO builds the join condition from the foreign key definition between the main class and the joined class.

## See Also

- [xPDOQuery.leftJoin](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.leftjoin "xPDOQuery.leftJoin")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")