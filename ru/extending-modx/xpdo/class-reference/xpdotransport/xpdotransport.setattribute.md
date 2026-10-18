---
title: "xPDOTransport.setAttribute"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.setattribute"
---

## xPDOTransport::setAttribute

Задаёт атрибут транспорта, например его сигнатуру или версию.

## Синтаксис

``` php
boolean setAttribute (string $key, mixed $value)
```

## Пример

``` php
$transport->setAttribute('signature', 'my_package-1.0.0-pl');
```

## Смотрите также

-   [xPDOTransport.getAttribute](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.getattribute "xPDOTransport.getAttribute")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")