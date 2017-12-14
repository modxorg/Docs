---
title: "xPDOQuery.select"
_old_id: "1638"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.select"
---

xPDOQuery::select
-----------------

Specify columns to return from the SQL query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#select>

```
<pre class="brush: php">
xPDOQuery select ([string $columns = '*'])

```Example
-------

Get a collection of Boxes, with only the ID and name fields.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->select('Box.id, Box.name AS boxName');
$boxes = $xpdo->getCollection('Box',$c);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")