---
title: "xPDO.getDriver"
description: "Получает имя текущего PDO-драйвера."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getdriver"
---

## xPDO::getDriver

Возвращает имя PDO-драйвера, который в данный момент используется экземпляром xPDO, например `mysql`.

## Синтаксис

``` php
string|null getDriver ()
```

## Пример

``` php
$driver = $xpdo->getDriver();
```

## Смотрите также

-   [xPDO.getConnection](extending-modx/xpdo/class-reference/xpdo/xpdo.getconnection "xPDO.getConnection")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")