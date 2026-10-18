---
title: "xPDOManager.alterObjectContainer"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.alterobjectcontainer"
---

## xPDOManager::alterObjectContainer

Изменяет существующий контейнер объектов (таблицу) в соответствии с текущей схемой класса. Используйте это после изменения поля, индекса или ограничения в вашей модели, чтобы привести таблицу базы данных в соответствие с ней.

## Синтаксис

``` php
boolean alterObjectContainer (string $className, [array $options = array()])
```

## Пример

``` php
$manager = $xpdo->getManager();
$manager->alterObjectContainer('MyVendor\\MyPackage\\MyModel');
```

## Смотрите также

-   [createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer "createObjectContainer")
-   [removeObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeobjectcontainer "removeObjectContainer")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")