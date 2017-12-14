---
title: "xPDOQuery.andCondition"
_old_id: "1631"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.andcondition"
---

xPDOQuery::andCondition
-----------------------

Add an AND condition to the WHERE clause.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#andCondition>

```
<pre class="brush: php">
void andCondition ( $conditions, [ $binding = null], [ $group = 0])

```Example
-------

Grab all Boxes with width of 12 and height of 4.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->where(array('width' => 12));
$query->andCondition(array('height' => 4));
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")