---
title: "_loadInstance"
description: "This function is responsible for turning a result set row into an xPDOObject instance of the proper class."
_old_id: "1141"
_old_uri: "2.x/class-reference/xpdoobject/static-object-loaders/loadinstance"
---

## xPDOObject::\_loadInstance()

This function is responsible for turning a result set row into an xPDOObject instance of the proper class.

## Syntax

``` php
static xPDOObject|null _loadInstance(
   xPDO &$xpdo,
   string $className,
   mixed $criteria,
   array $row
)
```
