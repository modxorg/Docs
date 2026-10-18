---
title: "xPDOGenerator.getTableName"
translation: "extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.gettablename"
---

## xPDOGenerator::getTableName

Возвращает имя таблицы базы данных по имени класса, применяя префикс таблицы. Если `$prefixRequired` истинно, префикс должен присутствовать, чтобы имя было возвращено.

## Синтаксис

```php
string|null getTableName (string $string, [string $prefix = ''], [boolean $prefixRequired = false])
```

## Пример

```php
$generator = $manager->getGenerator();
$table = $generator->getTableName('MyVendor\\MyPackage\\MyModel', 'my_');
```

## Смотрите также

-   [getClassName](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassname "getClassName")
-   [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")