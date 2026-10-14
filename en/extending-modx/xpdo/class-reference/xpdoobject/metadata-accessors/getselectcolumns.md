---
title: "getSelectColumns"
description: "Get a set of column names from an xPDOObject for use in SQL queries."
_old_id: "1180"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getselectcolumns"
---

## xPDOObject::getSelectColumns()

Get a set of column names from an xPDOObject for use in SQL queries.

## Syntax

``` php
static string getSelectColumns (
   xPDO &$xpdo,
   string $className,
   [string $tableAlias = ''],
   [string $columnPrefix = ''],
   [array $columns = array ()],
   [boolean $exclude = false]
)
```

## Examples

``` php
$columnString = xPDOObject::getSelectColumns($xpdo,'modChunk');
```