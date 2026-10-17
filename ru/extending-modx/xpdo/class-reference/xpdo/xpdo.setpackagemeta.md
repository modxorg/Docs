---
title: "xPDO.setPackageMeta"
description: "Регистрирует метаданные пакета из файла метаданных."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.setpackagemeta"
---

## xPDO::setPackageMeta

Читает файл `metadata.{platform}.php` пакета и регистрирует его префикс PSR-4 в автозагрузчике Composer. Конверт метаданных (`version`, `namespace`, `namespacePrefix`, `class_map`) используется только при версии схемы `3.0` или выше; для более старых версий метод откатывается к устаревшей раскладке карты классов.

## Синтаксис

``` php
boolean setPackageMeta (string $pkg, [string $path = ''], [string|null $namespacePrefix = null])
```

## Пример

``` php
$xpdo->setPackageMeta('MODX\\Revolution', MODX_CORE_PATH . 'src/', 'MODX\\');
```

## Смотрите также

-   [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")