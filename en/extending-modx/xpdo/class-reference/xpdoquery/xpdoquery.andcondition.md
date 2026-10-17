---
title: "xPDOQuery.andCondition"
description: "Add an AND condition to the WHERE clause."
_old_id: "1290"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.andcondition"
---

## xPDOQuery::andCondition

Add an AND condition to the WHERE clause.

## Syntax

``` php
xPDOQuery andCondition ( $conditions, [ $binding = null], [ $group = 0])
```

## Example

Grab all Boxes with width of 12 and height of 4.

``` php
$query = $xpdo->newQuery('Box');
$query->where(array('width' => 12));
$query->andCondition(array('height' => 4));
$boxes = $xpdo->getCollection('Box',$query);
```

**Warning**
The order you call the functions is important! The **andCondition** must come after the **where** method has been used.

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
