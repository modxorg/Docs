---
title: "set"
_old_id: "1209"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/set"
---

## xPDOObject::set()

Set a field value by the field key or name.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::set()>

``` php
boolean set(
   string $k,
   [mixed $v = null],
   [string|callable $vType = '']
)
```

## Examples

Set the object's name:

``` php
$object->set('name','Billy');
```