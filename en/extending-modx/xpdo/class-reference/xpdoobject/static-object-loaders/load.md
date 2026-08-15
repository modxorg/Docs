---
title: "load"
_old_id: "1191"
_old_uri: "2.x/class-reference/xpdoobject/static-object-loaders/load"
---

## xPDOObject::load()

This function is responsible for loading a single object instance from a **row** in the database table represented by a specific class

## Syntax

API Doc: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::load()>

``` php
static object|null load(
   xPDO &$xpdo,
   string $className,
   mixed $criteria,
   [boolean|integer $cacheFlag = true]
)
```