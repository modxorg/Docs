---
title: "xPDOQuery.leftJoin"
_old_id: "1293"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.leftjoin"
---

## xPDOQuery::leftJoin

Adds a LEFT JOIN clause to the query.

## Syntax

API Docs: [xPDOQuery::leftJoin()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::leftJoin())

``` php
void leftJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = xPDOQuery::SQL_AND], [ $binding = null], [ $condGroup = 0])
```

## Example

Select all Boxes and the Owner name.

``` php
$query = $xpdo->newQuery('Box');
$query->select($xpdo->getSelectColumns('Box'));
$query->select(array(
  'Owner.name'
));
$query->leftJoin('Owner','Owner');
$boxes = $xpdo->getCollection('Box',$query);
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
