---
title: "_loadRows"
description: "This function is responsible for loading a result set from the database and returning a PDOStatement object representing the result set."
_old_id: "1142"
_old_uri: "2.x/class-reference/xpdoobject/static-object-loaders/loadrows"
---

## xPDOObject::\_loadRows()

This function is responsible for loading a result set from the database and returning a PDOStatement object representing the result set.

## Syntax

``` php
static PDOStatement|null _loadRows(
   xPDO &$xpdo,
   string $className,
   mixed $criteria
)
```
