---
title: "xPDOManager.addConstraint"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addconstraint"
---

## xPDOManager::addConstraint

Добавляет ограничение внешнего ключа к таблице класса. Массив `$options` описывает само ограничение.

## Синтаксис

``` php
boolean addConstraint (string $class, string $name, [array $options = array()])
```

## Пример

``` php
$manager = $xpdo->getManager();
$manager->addConstraint('MyVendor\\MyPackage\\MyModel', 'owner_fk', array(
    'foreign' => 'id',
    'local' => 'owner_id',
    'constraint' => 'Owner',
));
```

## Смотрите также

-   [removeConstraint](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeconstraint "removeConstraint")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")