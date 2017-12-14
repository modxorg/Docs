---
title: "xPDOQuery.rightJoin"
_old_id: "1637"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.rightjoin"
---

xPDOQuery::rightJoin
--------------------

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#rightJoin>

```
<pre class="brush: php">
void rightJoin ( $class, [ $alias = ''], [ $conditions = array ()], [ $conjunction = XPDO_SQL_AND], [ $binding = null], [ $condGroup = 0])

```Example
-------

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->rightJoin('Owner','Owner');
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")