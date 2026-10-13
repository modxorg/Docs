---
title: "xPDOQuery.rightJoin"
description: "Adds a RIGHT JOIN clause to the query."
_old_id: "1296"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.rightjoin"
---

## xPDOQuery::rightJoin

## Syntax

``` php
void rightJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = xPDOQuery::SQL_AND], [ $binding = null], [ $condGroup = 0])
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->rightJoin('Owner','Owner');
$boxes = $xpdo->getCollection('Box',$query);
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
