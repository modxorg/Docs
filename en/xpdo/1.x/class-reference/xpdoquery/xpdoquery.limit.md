---
title: "xPDOQuery.limit"
_old_id: "1635"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.limit"
---

xPDOQuery::limit
----------------

Add a LIMIT/OFFSET clause to the query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#limit>

```
<pre class="brush: php">
xPDOQuery limit (integer $limit, [integer $offset = 0])

```Example
-------

Get Boxes 11-20, or the 2nd 10 Boxes.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->limit(10,10);
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")