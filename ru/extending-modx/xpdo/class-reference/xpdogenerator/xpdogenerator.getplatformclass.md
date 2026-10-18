---
title: "xPDOGenerator.getPlatformClass"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getplatformclass"
---

## xPDOGenerator::getPlatformClass

Возвращает полное имя класса платформы, сгенерированного для класса домена, например подкласса `mysql`. Именно класс платформы хранит статический `$metaMap` для класса домена.

## Синтаксис

``` php
string getPlatformClass (string $domainClass)
```

## Пример

``` php
$generator = $manager->getGenerator();
$platform = $generator->getPlatformClass('MyVendor\\MyPackage\\MyModel');
```

## Смотрите также

-   [getClassPlatformTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassplatformtemplate "getClassPlatformTemplate")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")