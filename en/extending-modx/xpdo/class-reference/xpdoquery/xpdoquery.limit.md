---
title: "xPDOQuery.limit"
_old_id: "1294"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.limit"
---

## xPDOQuery::limit

Add a LIMIT/OFFSET clause to the query.

## Syntax

API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoquery.class.html#\\xPDOQuery::limit()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::limit())

``` php 
xPDOQuery limit (integer $limit, [integer $offset = 0])
```

## Example

Get Boxes 11-20, or the 2nd 10 Boxes.

``` php 
$query = $xpdo->newQuery('Box');
$query->limit(10,10);
$boxes = $xpdo->getCollection('Box',$query);
```

## See Also

- [xPDOQuery](xpdo/class-reference/xpdoquery "xPDOQuery")