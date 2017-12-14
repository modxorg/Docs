---
title: "fromJSON"
_old_id: "1517"
_old_uri: "1.x/class-reference/xpdoobject/field-accessors/fromjson"
---

xPDOObject::fromJSON()
----------------------

Sets the object fields from a JSON object string.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#fromJSON>

```
<pre class="brush: php">
void fromJSON (
   string $jsonSource,
   [string $keyPrefix = ''],
   [boolean $setPrimaryKeys = false],
   [boolean $rawValues = false],
   [boolean $adhocValues = false]
)

```Example
-------

```
<pre class="brush: php">
$str = '{"name":"Sirius","email":"Black"}';
$object->fromJSON($str);
echo $object->get('name').' '.$object->get('email');
// prints "Sirius Black"

```