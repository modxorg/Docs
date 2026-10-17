---
title: "xPDO.addConnection"
description: "Добавляет дополнительное соединение в пул соединений."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.addconnection"
---

## xPDO::addConnection

Добавляет соединение в пул соединений, доступных экземпляру xPDO. Пул используется, когда задан параметр `xPDO::OPT_CONNECTIONS`, а соединения выбираются в соответствии с `xPDO::OPT_CONN_INIT` и `xPDO::OPT_CONN_MUTABLE`.

## Синтаксис

```php
boolean addConnection (string $dsn, [string $username = ''], [string $password = ''], [array $options = array()], [mixed $driverOptions = null])
```

## Пример

```php
$xpdo->addConnection('mysql:host=db2.example.com;dbname=archive;charset=utf8', 'user', 'pass');
```

## Смотрите также

-   [xPDO.getConnection](extending-modx/xpdo/class-reference/xpdo/xpdo.getconnection "xPDO.getConnection")
-   [Database Connections](extending-modx/xpdo/create-xpdo-instance/connections "Database Connections")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")