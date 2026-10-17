---
title: "xPDO.parseDSN"
description: "Разбирает строку DSN на составляющие части."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.parseDsn"
---

## xPDO::parseDSN

Разбирает строку DSN для PDO в ассоциативный массив с ключами `driver`, `host`, `database` и `charset`. Это полезно, потому что некоторые методы xPDO, например `xPDOManager::createSourceContainer()`, ожидают разобранный массив, а не исходную строку DSN.

## Синтаксис

``` php
array|null parseDSN (string $string)
```

## Пример

``` php
$dsn = 'mysql:host=localhost;dbname=mydb;charset=utf8';
$parts = xPDO::parseDSN($dsn);
// array('driver' => 'mysql', 'host' => 'localhost',
//       'database' => 'mydb', 'charset' => 'utf8')
```

## Смотрите также

-   [xPDOManager.createSourceContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createsourcecontainer "xPDOManager.createSourceContainer")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")