---
title: "xPDO.getCount"
_old_id: "1584"
_old_uri: "1.x/class-reference/xpdo/xpdo.getcount"
---

xPDO::getCount
--------------

Retrieves a count of xPDOObjects by the specified array or xPDOCriteria.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getCount>

```
<pre class="brush: php">
integer getCount (string $className, [mixed $criteria = null])

```Example
-------

Get a count of all the Box objects with width 20.

```
<pre class="brush: php">
$total = $xpdo->getCount('Box',array(
   'width' => 20,
));

```See Also
--------

- [xPDO.getObject](/xpdo/1.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO.getCollection](/xpdo/1.x/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")