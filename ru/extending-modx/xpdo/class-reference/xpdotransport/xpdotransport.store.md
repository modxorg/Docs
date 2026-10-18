---
title: "xPDOTransport.store"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.store"
---

## xPDOTransport::store

Сохраняет транспорт в указанном месте, записывая его манифест и все сохранённые файлы. Возвращает `true` при успехе и `false` при ошибке.

## Синтаксис

``` php
boolean store (string $location)
```

## Пример

``` php
$transport->store(MODX_CORE_PATH . 'packages/');
```

## Смотрите также

-   [xPDOTransport.pack](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.pack "xPDOTransport.pack")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")