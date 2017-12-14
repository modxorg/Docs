---
title: "xPDOQuery.setClassAlias"
_old_id: "1639"
_old_uri: "1.x/class-reference/xpdoquery/xpdoquery.setclassalias"
---

xPDOQuery::setClassAlias
------------------------

Sets a SQL alias for the table represented by the main class.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOQuery.html#setClassAlias>

```
<pre class="brush: php">
xPDOQuery setClassAlias ([string $alias = ''])

```Example
-------

Grab all OtherBox objects, but set the alias to 'Box' for easier reading.

```
<pre class="brush: php">
$query = $xpdo->newQuery('OtherBox');
$query->setClassAlias('Box');
$query->where(array(
   'Box.name' => 'RoundBox',
));
$otherBoxes = $xpdo->getCollection('OtherBox',$query);

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")