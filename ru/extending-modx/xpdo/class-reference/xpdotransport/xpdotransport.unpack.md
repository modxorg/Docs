---
title: "xPDOTransport.unpack"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.unpack"
---

## xPDOTransport::unpack

Распаковывает архив транспортного пакета из одного расположения в другое. Аргумент `$state` указывает, упакован ли архив или уже распакован.

## Синтаксис

```php
boolean unpack (xPDO &$xpdo, string $from, string $to, [integer $state = xPDOTransport::STATE_PACKED])
```

## Пример

```php
xPDOTransport::unpack($xpdo, MODX_CORE_PATH . 'packages/my_package.transport.zip', MODX_CORE_PATH . 'packages/');
```

## Смотрите также

-   [xPDOTransport.retrieve](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.retrieve "xPDOTransport.retrieve")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")