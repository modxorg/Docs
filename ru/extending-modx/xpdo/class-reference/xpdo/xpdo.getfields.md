---
title: "xPDO.getFields"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getfields"
---

## xPDO::getFields

Получает список полей (или столбцов) для объекта по имени класса.

Это включает значения по умолчанию для каждого поля и используется самими объектами для создания своих начальных атрибутов на основе наследования классов.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getFields()>

```php
array getFields (string $className)
```

## Пример

Получите список полей для объекта Box, который имеет 3 поля: id, width и height:

```php
$fields = $xpdo->getFields('Box');
print_r($fields); // prints: Array ([id] => 1, [width] => 10, [height] => 23)
```

## Смотрите также

-   [xPDO](extending-modx/xpdo "xPDO")
