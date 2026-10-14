---
title: "getSelectColumns"
description: "Получает набор имен столбцов из xPDOObject для использования в запросах SQL."
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getselectcolumns"
---

## xPDOObject::getSelectColumns()

Получает набор имен столбцов из `xPDOObject` для использования в запросах SQL.

## Синтаксис

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
