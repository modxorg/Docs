---
title: "xPDOGenerator.getClassTemplate"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclasstemplate"
---

## xPDOGenerator::getClassTemplate

Возвращает шаблон, по которому генерируется файл класса домена. В шаблоне используются плейсхолдеры `[+class-header+]`, `[+class-declaration+]`, `[+class-properties+]`, `[+class-methods+]` и `[+class-close-declaration+]`.

## Синтаксис

``` php
string getClassTemplate ()
```

## Пример

``` php
$generator = $manager->getGenerator();
$template = $generator->getClassTemplate();
```

## Смотрите также

-   [getClassPlatformTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassplatformtemplate "getClassPlatformTemplate")
-   [getMetaTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getmetatemplate "getMetaTemplate")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")