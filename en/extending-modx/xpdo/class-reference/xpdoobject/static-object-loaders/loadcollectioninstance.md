---
title: "_loadCollectionInstance"
description: "This function is responsible for loading an xPDOObject instance into a collection."
_old_id: "1140"
_old_uri: "2.x/class-reference/xpdoobject/static-object-loaders/loadcollectioninstance"
---

## xPDOObject::\_loadCollectionInstance()

This function is responsible for loading an xPDOObject instance into a collection.

## Syntax

``` php
static boolean _loadCollectionInstance(
   xPDO &$xpdo,
   array &$objCollection,
   string $className,
   mixed $criteria,
   array $row,
   boolean $fromCache,
   boolean|integer $cacheFlag
)
```
