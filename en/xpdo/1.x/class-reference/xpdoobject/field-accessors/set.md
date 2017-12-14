---
title: "set"
_old_id: "1556"
_old_uri: "1.x/class-reference/xpdoobject/field-accessors/set"
---

xPDOObject::set()
-----------------

Set a field value by the field key or name.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#set>

```
<pre class="brush: php">
boolean set(
   string $k,
   [mixed $v = null],
   [string|callable $vType = '']
)

```Examples
--------

Set the object's name:

```
<pre class="brush: php">
$object->set('name','Billy');

```