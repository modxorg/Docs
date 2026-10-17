---
title: "xPDOGenerator.compile"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.compile"
---

## xPDOGenerator::compile

Компилирует сгенерированные классы в кешированную форму. В xPDO 3.x реализация этого метода для MySQL является заглушкой, которая всегда возвращает `false`, поэтому опция `compile` у `parseSchema()` и флаг `--compile` в CLI не имеют эффекта для MySQL.

## Синтаксис

```php
boolean compile ([string $path = ''])
```

## Пример

```php
$generator = $manager->getGenerator();
$generator->compile($outputDir);
```

## Смотрите также

-   [parseSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.parseschema "parseSchema")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")