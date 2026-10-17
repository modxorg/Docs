---
title: "xPDOManager.removeConstraint"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeconstraint"
---

## xPDOManager::removeConstraint

Удаляет ограничение внешнего ключа из таблицы класса.

## Синтаксис

``` php
boolean removeConstraint (string $class, string $name, [array $options = array()])
```

## Пример

``` php
$manager = $xpdo->getManager();
$manager->removeConstraint('MyVendor\\MyPackage\\MyModel', 'owner_fk');
```

## Смотрите также

-   [addConstraint](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addconstraint "addConstraint")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")