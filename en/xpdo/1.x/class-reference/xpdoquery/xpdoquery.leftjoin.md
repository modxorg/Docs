---
title: "xPDOQuery.leftJoin"
_old_id: "1634"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.leftjoin"
---

xPDOQuery::leftJoin
-------------------

Adds a LEFT JOIN clause to the query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#leftJoin>

```
<pre class="brush: php">
void leftJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = XPDO_SQL_AND], [ $binding = null], [ $condGroup = 0])

```Example
-------

Select all Boxes and the Owner name.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->select('Box.*, Owner.name');
$query->leftJoin('Owner','Owner');
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")