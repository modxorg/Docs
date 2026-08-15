---
title: "getSelectColumns"
_old_id: "1180"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getselectcolumns"
---

## xPDOObject::getSelectColumns()

Get a set of column names from an xPDOObject for use in SQL queries.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::getSelectColumns()>

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