---
title: "xPDOManager.alterField"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.alterfield"
---

## xPDOManager::alterField

Изменяет существующий столбец в таблице класса. Массив `$options` описывает новое определение столбца.

## Синтаксис

``` php
boolean alterField (string $class, string $name, [array $options = array()])
```

## Пример

``` php
$manager = $xpdo->getManager();
$manager->alterField('MyVendor\\MyPackage\\MyModel', 'subtitle', array(
    'dbtype' => 'varchar',
    'precision' => '512',
    'phptype' => 'string',
    'null' => true,
));
```

## Смотрите также

-   [addField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addfield "addField")
-   [removeField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removefield "removeField")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")