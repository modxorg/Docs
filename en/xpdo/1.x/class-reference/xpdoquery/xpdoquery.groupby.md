---
title: "xPDOQuery.groupby"
_old_id: "1632"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.groupby"
---

xPDOQuery::groupby
------------------

Add a GROUP BY clause to the query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#groupby>

```
<pre class="brush: php">
xPDOQuery groupby (string $column, [string $direction = ''])

```Example
-------

Grab the different 'type's of Boxes with at least one Box of width 15.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 15,
));
$query->groupby('type');
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")