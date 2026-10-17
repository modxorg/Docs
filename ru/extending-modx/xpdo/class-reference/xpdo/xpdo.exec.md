---
title: "xPDO.exec"
description: "Выполняет SQL-оператор, не возвращающий набор результатов."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.exec"
---

## xPDO::exec

Выполняет SQL-оператор, который не возвращает набор результатов, например `INSERT`, `UPDATE`, `DELETE` или DDL. Возвращает количество затронутых строк либо `false` в случае ошибки.

## Синтаксис

```php
integer|boolean exec (string $query)
```

## Пример

```php
$affected = $xpdo->exec("UPDATE my_table SET active = 0 WHERE id = 42");
```

## Смотрите также

-   [xPDO.prepare](extending-modx/xpdo/class-reference/xpdo/xpdo.prepare "xPDO.prepare")
-   [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")