---
title: "xPDOGenerator.getMetaTemplate"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getmetatemplate"
---

## xPDOGenerator::getMetaTemplate

Возвращает шаблон, используемый для генерации устаревшего массива `xpdo_meta_map` для более старых версий схемы.

## Синтаксис

``` php
string getMetaTemplate ()
```

## Пример

``` php
$generator = $manager->getGenerator();
$template = $generator->getMetaTemplate();
```

## Смотрите также

-   [outputMeta](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputmeta "outputMeta")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")