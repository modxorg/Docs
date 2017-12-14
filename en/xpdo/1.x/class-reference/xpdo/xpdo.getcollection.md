---
title: "xPDO.getCollection"
_old_id: "1583"
_old_uri: "1.x/class-reference/xpdo/xpdo.getcollection"
---

xPDO::getCollection
-------------------

Retrieves a collection of xPDOObjects by the specified xPDOCriteria.

If none are found, returns an empty array.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getCollection>

```
<pre class="brush: php">
array|null getCollection (string $className, [object|array|string $criteria = null], [mixed $cacheFlag = true])

```Example
-------

Get a collection of Box objects with a width of 40.

```
<pre class="brush: php">
$boxes = $xpdo->getCollection('Box',array(
   'width' => 40,
));

```See Also
--------

- [Retrieving Objects](/xpdo/1.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.getObject](/xpdo/1.x/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")