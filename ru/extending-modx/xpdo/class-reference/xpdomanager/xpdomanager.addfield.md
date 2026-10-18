---
title: "xPDOManager.addField"
translation: "extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.addfield"
---

## xPDOManager::addField

Добавляет столбец в таблицу класса. Массив `$options` описывает столбец; допустимые ключи смотрите в `getColumnDef()` в менеджере драйвера.

## Синтаксис

```php
boolean addField (string $class, string $name, [array $options = array()])
```

## Пример

```php
$manager = $xpdo->getManager();
$manager->addField('MyVendor\\MyPackage\\MyModel', 'subtitle', array(
    'dbtype' => 'varchar',
    'precision' => '255',
    'phptype' => 'string',
    'null' => true,
));
```

## Смотрите также

-   [alterField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.alterfield "alterField")
-   [removeField](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.removefield "removeField")
-   [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")