---
title: "xPDO.setPackage"
description: "Регистрирует пакет и задаёт его префикс таблиц как значение по умолчанию."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.setpackage"
---

## xPDO::setPackage

Регистрирует пакет в xPDO точно так же, как [addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage"), и дополнительно задаёт префикс таблиц пакета как глобальный префикс по умолчанию. Глобальный префикс используется для классов, не входящих в зарегистрированный пакет.

## Синтаксис

```php
boolean setPackage (string $pkg = '', [string $path = ''], [string|null $prefix = null], [string|null $namespacePrefix = null])
```

## Пример

```php
$xpdo->setPackage('MyVendor\\MyPackage', MODX_CORE_PATH . 'components/mypackage/model/', null, 'MyVendor\\MyPackage\\');
```

## Смотрите также

-   [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage")
-   [xPDO.setPackageMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.setpackagemeta "xPDO.setPackageMeta")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")