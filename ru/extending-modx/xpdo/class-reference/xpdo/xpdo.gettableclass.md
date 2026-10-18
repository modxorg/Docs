---
title: "xPDO.getTableClass"
description: "Получает имя таблицы базы данных для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.gettableclass"
---

## xPDO::getTableClass

Возвращает имя таблицы базы данных, связанной с классом. Возвращает `null`, если для класса не определена таблица.

## Синтаксис

``` php
string|null getTableClass (string $className)
```

## Пример

``` php
$table = $xpdo->getTableClass('modResource');
// 'site_content'
```

## Смотрите также

-   [xPDO.getTableName](extending-modx/xpdo/class-reference/xpdo/xpdo.gettablename "xPDO.getTableName")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")