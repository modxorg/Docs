---
title: "loadCollection"
_old_id: "1192"
_old_uri: "2.x/class-reference/xpdoobject/static-object-loaders/loadcollection"
---

## xPDOObject::loadCollection()

This function is responsible for loading a collection of object instances from **rows** in the database table represented by a specific class.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::loadCollection()>

``` php
static array loadCollection(
    xPDO &$xpdo,
    string $className,
    [mixed $criteria = null],
    [boolean|integer $cacheFlag = true]
)
```