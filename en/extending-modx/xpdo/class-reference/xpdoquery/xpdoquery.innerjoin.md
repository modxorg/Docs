---
title: "xPDOQuery.innerJoin"
_old_id: "1292"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.innerjoin"
---

## xPDOQuery::innerJoin

Add an INNER JOIN clause to the query.

## Syntax

API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoquery.class.html#\\xPDOQuery::innerJoin()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::innerJoin())

``` php
void innerJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = xPDOQuery::SQL_AND], [ $binding = null], [ $condGroup = 0])
```

## Example

Grab only Boxes with an Owner named Mark.

``` php
$query = $xpdo->newQuery('Box');
$query->innerJoin('Owner','Owner');
$query->where(array(
   'Owner.name' => 'Mark',
));
$boxes = $xpdo->getCollection('Box',$query);
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")