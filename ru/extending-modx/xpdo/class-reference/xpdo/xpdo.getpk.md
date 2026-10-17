---
title: "xPDO.getPK"
description: "Получает имя (имена) поля первичного ключа для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getpk"
---

## xPDO::getPK

Возвращает имя поля, представляющего первичный ключ класса, массив имён ключей для составного первичного ключа или `null`, если первичный ключ не определён.

## Синтаксис

``` php
mixed getPK (string $className)
```

## Пример

``` php
$pk = $xpdo->getPK('modResource');
// 'id'
```

## Смотрите также

-   [xPDO.getPKType](extending-modx/xpdo/class-reference/xpdo/xpdo.getpktype "xPDO.getPKType")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")