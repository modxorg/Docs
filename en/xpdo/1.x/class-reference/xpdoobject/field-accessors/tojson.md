---
title: "toJSON"
_old_id: "1565"
_old_uri: "1.x/class-reference/xpdoobject/field-accessors/tojson"
---

xPDOObject::toJSON()
--------------------

Returns a JSON representation of the object.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#toJSON>

```
<pre class="brush: php">
string toJSON (
   [string $keyPrefix = ''],
   [boolean $rawValues = false]
)

```Example
-------

```
<pre class="brush: php">
$object->set('name','Bob');
$object->set('email','pinkdaisies@gmail.com');
$json = $object->toJSON();
echo $json;
// prints {"name":"Bob","email":"pinkdaisies@gmail.com"}

```