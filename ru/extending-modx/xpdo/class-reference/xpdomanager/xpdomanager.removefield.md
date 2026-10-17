---
title: "xPDOManager.removeField"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removefield"
---

## xPDOManager::removeField

Удаляет колонку из таблицы класса.

## Синтаксис

``` php
boolean removeField (string $class, string $name, [array $options = array()])
```

## Пример

``` php
$manager = $xpdo->getManager();
$manager->removeField('MyVendor\\MyPackage\\MyModel', 'subtitle');
```

## Смотрите также

-   [addField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addfield "addField")
-   [alterField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.alterfield "alterField")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")