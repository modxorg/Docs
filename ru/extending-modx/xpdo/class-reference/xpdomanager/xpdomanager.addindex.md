---
title: "xPDOManager.addIndex"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addindex"
---

## xPDOManager::addIndex

Добавляет индекс в таблицу класса. Массив `$options` описывает индекс, включая его тип и колонки.

## Синтаксис

```php
boolean addIndex (string $class, string $name, [array $options = array()])
```

## Пример

```php
$manager = $xpdo->getManager();
$manager->addIndex('MyVendor\\MyPackage\\MyModel', 'name_idx', array(
    'columns' => array('name' => array()),
    'unique' => false,
));
```

## Смотрите также

-   [removeIndex](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeindex "removeIndex")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")