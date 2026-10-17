---
title: "xPDOTransport.checkDependencies"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.checkdependencies"
---

## xPDOTransport::checkDependencies

Проверяет, удовлетворены ли зависимости, объявленные транспортом. Возвращает `true`, когда все требуемые пакеты присутствуют, иначе — массив с описанием отсутствующих.

## Синтаксис

``` php
boolean|array checkDependencies ([array $options = array()])
```

## Пример

``` php
if ($transport->checkDependencies() !== true) {
    // missing dependencies
}
```

## Смотрите также

-   [xPDOTransport.getDependencies](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.getdependencies "xPDOTransport.getDependencies")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")