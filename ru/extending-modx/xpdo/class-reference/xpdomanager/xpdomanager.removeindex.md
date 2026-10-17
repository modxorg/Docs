---
title: "xPDOManager.removeIndex"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removeindex"
---

## xPDOManager::removeIndex

Удаляет индекс из таблицы класса.

## Синтаксис

```php
boolean removeIndex (string $class, string $name, [array $options = array()])
```

## Пример

```php
$manager = $xpdo->getManager();
$manager->removeIndex('MyVendor\\MyPackage\\MyModel', 'name_idx');
```

## Смотрите также

-   [addIndex](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addindex "addIndex")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")