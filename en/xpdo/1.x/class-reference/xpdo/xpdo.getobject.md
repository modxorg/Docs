---
title: "xPDO.getObject"
_old_id: "1588"
_old_uri: "1.x/class-reference/xpdo/xpdo.getobject"
---

xPDO::getObject
---------------

Retrieves a single object instance by the specified criteria.

The criteria can be a primary key value, and array of primary key values (for multiple primary key objects) or an xPDOCriteria object. If no $criteria parameter is specified, no class is found, or an object cannot be located by the supplied criteria, null is returned.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getObject>

```
<pre class="brush: php">
object|null getObject (string $className, [mixed $criteria = null], [mixed $cacheFlag = true])

```Example
-------

Get a Box object with ID 134.

```
<pre class="brush: php">
$box = $xpdo->getObject('Box',134);

```See Also
--------

- [Retrieving Objects](/xpdo/1.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")
- [xPDO.getCollection](/xpdo/1.x/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
- <span class="error">\[xPDO.load\]</span>
- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")