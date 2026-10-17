---
title: "xPDOTransport.compareSignature"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.comparesignature"
---

## xPDOTransport::compareSignature

Сравнивает две сигнатуры пакетов и возвращает `-1`, `0` или `1` в зависимости от того, первая меньше второй, равна ей или больше неё.

## Синтаксис

```php
integer compareSignature (string $signature1, string $signature2)
```

## Пример

```php
$result = xPDOTransport::compareSignature('my_package-1.0.0-pl', 'my_package-1.0.0-beta');
```

## Смотрите также

-   [xPDOTransport.parseSignature](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.parsesignature "xPDOTransport.parseSignature")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")