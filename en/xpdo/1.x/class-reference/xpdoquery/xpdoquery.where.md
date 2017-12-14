---
title: "xPDOQuery.where"
_old_id: "1641"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.where"
---

xPDOQuery::where
----------------

Add a WHERE condition to the query.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#where>

```
<pre class="brush: php">
xPDOQuery where ([mixed $conditions = ''], [string $conjunction = XPDO_SQL_AND], [mixed $binding = null], [integer $condGroup = 0])

```Examples
--------

Get all Boxes with width of 15.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width' => 15,
));
$boxes = $xpdo->getCollection('Box',$query);

```Get all boxes with a width of 15 or 10.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->where(array('width' => 15));
$query->where(array('width' => 10),XPDO_SQL_OR); // you can use orCondition here as well
$boxes = $xpdo->getCollection('Box',$query);

```Grab all boxes with a width greater than or equal to 15, but not with a width of 23.

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->where(array(
   'width:>=' => 15,
   'width:!=' => 23,
));
$boxes = $xpdo->getCollection('Box',$query);

```Get all boxes with a name with the letter 'q' in it:

```
<pre class="brush: php">
$query = $xpdo->newQuery('Box');
$query->where(array(
   'name:LIKE' => '%q%',
));
$boxes = $xpdo->getCollection('Box',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")