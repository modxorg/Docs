---
title: "xPDOQuery.orCondition"
_old_id: "1636"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.orcondition"
---

xPDOQuery::orCondition
----------------------

Add an OR condition to the WHERE statement in the query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#>

```
<pre class="brush: php">
void orCondition ( $conditions, [ $binding = null], [ $group = 0])

```Example
-------

Grab all boxes with width 12 or 14.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 14,
));
$query->orCondition(array(
   'width' => 12,
));
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")