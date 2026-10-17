---
title: "xPDOTransport::__construct"
translation: "extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.construct"
---

## xPDOTransport::__construct

Создаёт экземпляр транспорта. Сигнатура определяет пакет, а путь — это каталог, который содержит (или будет содержать) архив транспорта.

## Синтаксис

``` php
__construct (xPDO &$xpdo, string $signature, string $path, [array $options = array()])
```

-   `$signature` — сигнатура пакета в виде `vendor-package-1.0.0-pl`.
-   `$path` — каталог, из которого читается или в который записывается архив транспорта.

## Пример

``` php
$transport = $manager->getTransport('my_package', MODX_CORE_PATH . 'packages/');
```

## Смотрите также

-   [xPDOManager.getTransport](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.gettransport "xPDOManager.getTransport")
-   [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")