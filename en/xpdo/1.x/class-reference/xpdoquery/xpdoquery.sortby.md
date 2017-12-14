---
title: "xPDOQuery.sortby"
_old_id: "1640"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.sortby"
---

xPDOQuery::sortby
-----------------

Add an ORDER BY clause to the query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#sortby>

```
<pre class="brush: php">
xPDOQuery sortby (string $column, [string $direction = 'ASC'])

```Example
-------

Get all the Box objects sorted by name.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->sortby('name','ASC');
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")