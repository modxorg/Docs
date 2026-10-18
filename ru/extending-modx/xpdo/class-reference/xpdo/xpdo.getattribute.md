---
title: "xPDO.getAttribute"
description: "Получает атрибут соединения PDO."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getattribute"
---

## xPDO::getAttribute

Возвращает значение атрибута соединения PDO, например `PDO::ATTR_DRIVER_NAME` или `PDO::ATTR_SERVER_VERSION`.

## Синтаксис

``` php
mixed getAttribute (integer $attribute)
```

## Пример

``` php
$driver = $xpdo->getAttribute(PDO::ATTR_DRIVER_NAME);
```

## Смотрите также

-   [xPDO.setAttribute](extending-modx/xpdo/class-reference/xpdo/xpdo.setattribute "xPDO.setAttribute")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")