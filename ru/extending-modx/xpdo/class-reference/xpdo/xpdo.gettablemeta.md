---
title: "xPDO.getTableMeta"
description: "Возвращает метаданные таблицы для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.gettablemeta"
---

## xPDO::getTableMeta

Возвращает «сырые» метаданные таблицы для класса, включая имя таблицы, движок и любой специфичный для пакета префикс, записанный для него.

## Синтаксис

```php
array|null getTableMeta (string $className)
```

## Пример

```php
$meta = $xpdo->getTableMeta('modResource');
```

## Смотрите также

-   [xPDO.getTableClass](extending-modx/xpdo/class-reference/xpdo/xpdo.gettableclass "xPDO.getTableClass")
-   [xPDO.getFieldMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.getfieldmeta "xPDO.getFieldMeta")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")