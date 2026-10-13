---
title: "xPDOQuery.groupby"
description: "Add a GROUP BY clause to the query."
_old_id: "1291"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.groupby"
---

## xPDOQuery::groupby

Add a GROUP BY clause to the query.

## Syntax

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
