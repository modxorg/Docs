---
title: "xPDO.toCache"
description: "Сохраняет объект в кеше по сигнатуре."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.tocache"
---

## xPDO::toCache

Сохраняет объект или значение в кеше под заданной сигнатурой, с необязательным временем жизни в секундах (`0` означает отсутствие срока действия).

## Синтаксис

``` php
boolean toCache (string $signature, mixed $object, [integer $lifetime = 0], [array $options = array()])
```

## Пример

``` php
$xpdo->toCache($signature, $collection, 3600);
```

## Смотрите также

-   [xPDO.fromCache](extending-modx/xpdo/class-reference/xpdo/xpdo.fromcache "xPDO.fromCache")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")