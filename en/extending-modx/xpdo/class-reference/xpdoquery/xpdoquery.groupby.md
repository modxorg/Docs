---
title: "xPDOQuery.groupby"
_old_id: "1291"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.groupby"
---

## xPDOQuery::groupby

Add a GROUP BY clause to the query.

## Syntax

API Docs: [http://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoquery.class.html#\\xPDOQuery::groupby()](http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoquery.class.html#xPDOQuery::groupby())

``` php 
xPDOQuery groupby (string $column, [string $direction = ''])
```

## Example

Grab the different 'type's of Boxes with at least one Box of width 15.

``` php 
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 15,
));
$query->groupby('type');
$boxes = $xpdo->getCollection('Box',$query);
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")