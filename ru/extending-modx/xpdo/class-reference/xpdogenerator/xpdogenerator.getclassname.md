---
title: "xPDOGenerator.getClassName"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassname"
---

## xPDOGenerator::getClassName

Преобразует имя таблицы базы данных в имя класса, который будет сгенерирован для неё, согласно правилам именования генератора.

## Синтаксис

```php
string getClassName (string $string)
```

## Пример

```php
$generator = $manager->getGenerator();
$class = $generator->getClassName('my_model');
```

## Смотрите также

-   [getTableName](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.gettablename "getTableName")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")