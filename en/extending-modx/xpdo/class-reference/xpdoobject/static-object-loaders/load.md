---
title: "load"
description: "This function is responsible for loading a single object instance from a row in the database table represented by a specific class"
_old_id: "1191"
_old_uri: "2.x/class-reference/xpdoobject/static-object-loaders/load"
---

## xPDOObject::load()

This function is responsible for loading a single object instance from a **row** in the database table represented by a specific class

## Syntax

``` php
static object|null load(
   xPDO &$xpdo,
   string $className,
   mixed $criteria,
   [boolean|integer $cacheFlag = true]
)
```