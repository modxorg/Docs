---
title: "xPDOGenerator.getClassPlatformTemplate"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassplatformtemplate"
---

## xPDOGenerator::getClassPlatformTemplate

Возвращает шаблон, используемый для генерации файла платформенного класса (например, подкласса `mysql` доменного класса). Сгенерированный платформенный класс содержит статическое свойство `$metaMap`.

## Синтаксис

``` php
string getClassPlatformTemplate ()
```

## Пример

``` php
$generator = $manager->getGenerator();
$template = $generator->getClassPlatformTemplate();
```

## Смотрите также

-   [getClassTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclasstemplate "getClassTemplate")
-   [getPlatformClass](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getplatformclass "getPlatformClass")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")