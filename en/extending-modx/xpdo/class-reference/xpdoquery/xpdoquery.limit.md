---
title: "xPDOQuery.limit"
description: "Add a LIMIT/OFFSET clause to the query."
_old_id: "1294"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.limit"
---

## xPDOQuery::limit

Add a LIMIT/OFFSET clause to the query.

## Syntax

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

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
