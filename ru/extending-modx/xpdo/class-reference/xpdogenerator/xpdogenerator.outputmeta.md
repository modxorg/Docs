---
title: "xPDOGenerator.outputMeta"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputmeta"
---

## xPDOGenerator::outputMeta

Записывает файл `metadata.{platform}.php` для разобранной схемы. Для версии схемы 3.0 и выше файл содержит конверт `version`, `namespace`, `namespacePrefix` и `class_map`, который включает автозагрузку пакета по PSR-4; для более старых версий создаётся плоская карта классов.

## Синтаксис

``` php
boolean outputMeta (string $path, [string $namespacePrefix = ''])
```

## Пример

``` php
$generator->outputMeta(MODX_CORE_PATH . 'components/mypackage/model/', 'MyVendor\\MyPackage\\');
```

## Смотрите также

-   [outputClasses](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputclasses "outputClasses")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")