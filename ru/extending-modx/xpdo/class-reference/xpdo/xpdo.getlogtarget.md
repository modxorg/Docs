---
title: "xPDO.getLogTarget"
description: "Получает текущую цель журналирования."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getlogtarget"
---

## xPDO::getLogTarget

Возвращает текущую цель журналирования экземпляра xPDO — строку вроде `ECHO`, `HTML` или `FILE`, либо массив, описывающий пользовательскую цель.

## Синтаксис

``` php
string|array getLogTarget ()
```

## Пример

``` php
$target = $xpdo->getLogTarget();
```

## Смотрите также

-   [xPDO.setLogTarget](extending-modx/xpdo/class-reference/xpdo/xpdo.setlogtarget "xPDO.setLogTarget")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")