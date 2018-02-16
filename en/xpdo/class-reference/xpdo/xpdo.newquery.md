---
title: "xPDO.newQuery"
_old_id: "1252"
_old_uri: "2.x/class-reference/xpdo/xpdo.newquery"
---

xPDO::newQuery
--------------

Creates an new xPDOQuery for a specified xPDOObject class.

Syntax
------

API Docs: <http://api.modx.com/xpdo/xPDO.html#newQuery>

```
<pre class="brush: php">
xPDOQuery newQuery (string $class, [mixed $criteria = null], [boolean|integer $cacheFlag = true])

```<div class="note">**Valid Class**  
The string you pass as the class name should be a _valid object class name_. It'll be the same name you use moments later with your call to [getObject](/xpdo/2.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject"), [getObjectGraph](/xpdo/2.x/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph"), [getCollection](/xpdo/2.x/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection"), or [getCollectionGraph](/xpdo/2.x/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph").</div>Examples
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

- [xPDOQuery](/xpdo/2.x/class-reference/xpdoquery "xPDOQuery")
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")