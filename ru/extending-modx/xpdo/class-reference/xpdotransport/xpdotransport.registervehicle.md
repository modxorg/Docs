---
title: "xPDOTransport.registerVehicle"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.registervehicle"
---

## xPDOTransport::registerVehicle

Регистрирует vehicle в транспорте. Vehicle определяет, как артефакт устанавливается или удаляется — например, копирование файла, запуск PHP-скрипта или сохранение уже существующего файла.

## Синтаксис

``` php
boolean registerVehicle (xPDO\Transport\xPDOTransportVehicle &$vehicle)
```

## Пример

``` php
$vehicle = $xpdo->newObject('xPDOFileVehicle');
$transport->registerVehicle($vehicle);
```

## Смотрите также

-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")