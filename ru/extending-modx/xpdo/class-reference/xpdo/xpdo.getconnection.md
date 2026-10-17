---
title: "xPDO.getConnection"
description: "Получает соединение из пула соединений."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getconnection"
---

## xPDO::getConnection

Возвращает текущее соединение с базой данных, выбирая одно из пула, если настроена опция `xPDO::OPT_CONNECTIONS`. Возвращает базовый экземпляр `PDO` или `null`, если соединение недоступно.

## Синтаксис

``` php
\PDO|null getConnection ([array $options = array()])
```

## Пример

``` php
$pdo = $xpdo->getConnection();
```

## Смотрите также

-   [xPDO.addConnection](extending-modx/xpdo/class-reference/xpdo/xpdo.addconnection "xPDO.addConnection")
-   [xPDO.connect](extending-modx/xpdo/class-reference/xpdo/xpdo.connect "xPDO.connect")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")