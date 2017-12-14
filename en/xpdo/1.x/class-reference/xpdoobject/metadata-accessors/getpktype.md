---
title: "getPKType"
_old_id: "1528"
_old_uri: "1.x/class-reference/xpdoobject/metadata-accessors/getpktype"
---

xPDOObject::getPKType()
-----------------------

Gets the type of the primary key field for the object.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getPKType>

```
<pre class="brush: php">
string getPKType()

```Examples
--------

Grabs the PK type of a table of Resources, which have an auto\_increment ID field:

```
<pre class="brush: php">
$resource = $xpdo->getObject('Resource',1);
echo $resource->getPKType();
// prints "integer"

```