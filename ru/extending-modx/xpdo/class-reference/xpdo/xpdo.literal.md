---
title: "xPDO.literal"
description: "Экранирует значение для использования как литерала в SQL."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.literal"
---

## xPDO::literal

Экранирует значение для использования как строковый литерал в SQL. Это вспомогательный метод более низкого уровня, применяемый при построении сырого SQL; по возможности отдавайте предпочтение подготовленным запросам и связанным параметрам.

## Синтаксис

```php
string literal (string $string)
```

## Пример

```php
$sql = 'SELECT * FROM my_table WHERE name = ' . $xpdo->literal($name);
```

## Смотрите также

-   [xPDO.escape](extending-modx/xpdo/class-reference/xpdo/xpdo.escape "xPDO.escape")
-   [xPDO.quote](extending-modx/xpdo/class-reference/xpdo/xpdo.quote "xPDO.quote")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")