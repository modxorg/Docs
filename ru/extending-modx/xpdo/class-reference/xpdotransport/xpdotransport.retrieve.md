---
title: "xPDOTransport.retrieve"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.retrieve"
---

## xPDOTransport::retrieve

Загружает или копирует архив транспортного пакета из исходного расположения в целевое. Аргумент `$state` указывает, упакован ли источник или распакован.

## Синтаксис

```php
boolean retrieve (xPDO &$xpdo, string $source, string $target, [integer $state = xPDOTransport::STATE_PACKED])
```

## Пример

```php
xPDOTransport::retrieve($xpdo, 'https://example.com/my_package.transport.zip', MODX_CORE_PATH . 'packages/');
```

## Смотрите также

-   [xPDOTransport.unpack](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.unpack "xPDOTransport.unpack")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")