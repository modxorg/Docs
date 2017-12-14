---
title: "xPDOQuery.innerJoin"
_old_id: "1633"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.innerjoin"
---

xPDOQuery::innerJoin
--------------------

Add an INNER JOIN clause to the query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#innerJoin>

```
<pre class="brush: php">
void innerJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = XPDO_SQL_AND], [ $binding = null], [ $condGroup = 0])

```Example
-------

Grab only Boxes with an Owner named Mark.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->innerJoin('Owner','Owner');
$query->where(array(
   'Owner.name' => 'Mark',
));
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")