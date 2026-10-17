---
title: "xPDO.rollBack"
description: "Откатывает текущую транзакцию."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.rollback"
---

## xPDO::rollBack

Откатывает текущую транзакцию. Возвращает `false`, если соединение недоступно, иначе — результат базового `PDO::rollBack()`.

## Синтаксис

``` php
boolean rollBack ()
```

## Пример

``` php
$xpdo->beginTransaction();
try {
    // ... write operations ...
    $xpdo->commit();
} catch (Exception $e) {
    $xpdo->rollBack();
}
```

## Смотрите также

-   [xPDO.beginTransaction](extending-modx/xpdo/class-reference/xpdo/xpdo.begintransaction "xPDO.beginTransaction")
-   [xPDO.commit](extending-modx/xpdo/class-reference/xpdo/xpdo.commit "xPDO.commit")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")