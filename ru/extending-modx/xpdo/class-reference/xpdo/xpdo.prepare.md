---
title: "xPDO.prepare"
description: "Готовит SQL-запрос к выполнению."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.prepare"
---

## xPDO::prepare

Готовит SQL-запрос к выполнению и возвращает объект `PDOStatement` либо `false` в случае ошибки. Перед выполнением привяжите к запросу параметры.

## Синтаксис

``` php
\PDOStatement|boolean prepare (string $statement, [array $driver_options = array()])
```

## Пример

``` php
$stmt = $xpdo->prepare('SELECT * FROM my_table WHERE id = :id');
$stmt->bindValue(':id', 42, PDO::PARAM_INT);
$stmt->execute();
```

## Смотрите также

-   [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
-   [xPDO.exec](extending-modx/xpdo/class-reference/xpdo/xpdo.exec "xPDO.exec")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")