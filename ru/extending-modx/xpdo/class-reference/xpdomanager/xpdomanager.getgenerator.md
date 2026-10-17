---
title: "xPDOManager.getGenerator"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.getgenerator"
---

## xPDOManager::getGenerator

Возвращает экземпляр [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator"), специфичный для драйвера, для текущего соединения. Он используется для разбора схем в классы или для обратного проектирования схем из таблиц. Возвращает `null`, если класс генератора не удалось создать.

## Синтаксис

```php
xPDOGenerator|null getGenerator ()
```

## Пример

```php
$manager = $xpdo->getManager();
$generator = $manager->getGenerator();
$generator->parseSchema($schemaFile, $outputDir);
```

## Смотрите также

-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")