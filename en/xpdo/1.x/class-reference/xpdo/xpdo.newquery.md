---
title: "xPDO.newQuery"
_old_id: "1594"
_old_uri: "1.x/class-reference/xpdo/xpdo.newquery"
---

xPDO::newQuery
--------------

Creates an new xPDOQuery for a specified xPDOObject class.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#newQuery>

```
<pre class="brush: php">
xPDOQuery newQuery (string $class, [mixed $criteria = null], [boolean|integer $cacheFlag = true])

```Examples
--------

Create a new Query for the Box object:

```
<pre class="brush: php">
$xpdo->newQuery('Box');

```Create a new Query for the Box object, but already add a WHERE clause limiting to Boxes with width greater than 10:

```
<pre class="brush: php">
$xpdo->newQuery('Box',array(
   'width:>' => 10,
));

```See Also
--------

- [xPDOQuery](/xpdo/1.x/class-reference/xpdoquery "xPDOQuery")
- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")