---
title: "getSelectColumns"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getselectcolumns"
---

## xPDOObject::getSelectColumns()

Получает набор имен столбцов из `xPDOObject` для использования в запросах SQL.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::getSelectColumns()>

```php
static string getSelectColumns (
   xPDO &$xpdo,
   string $className,
   [string $tableAlias = ''],
   [string $columnPrefix = ''],
   [array $columns = array ()],
   [boolean $exclude = false]
)
```

## Примеры

```php
$columnString = xPDOObject::getSelectColumns($xpdo,'modChunk');
```
