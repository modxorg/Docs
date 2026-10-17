---
title: "xPDOTransport.parseSignature"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.parsesignature"
---

## xPDOTransport::parseSignature

Разбирает сигнатуру пакета на составляющие: вендор, имя пакета, версию и индекс релиза.

## Синтаксис

```php
array|false parseSignature (string $signature)
```

## Пример

```php
$parts = xPDOTransport::parseSignature('my_vendor-my_package-1.0.0-pl');
// array('name' => 'my_package', 'version' => '1.0.0', 'release' => 'pl')
```

## Смотрите также

-   [xPDOTransport.compareSignature](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.comparesignature "xPDOTransport.compareSignature")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")