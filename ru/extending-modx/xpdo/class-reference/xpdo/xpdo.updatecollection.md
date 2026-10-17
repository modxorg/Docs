---
title: "xPDO.updateCollection"
description: "Обновляет набор столбцов для коллекции объектов."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.updatecollection"
---

## xPDO::updateCollection

Обновляет столбцы, перечисленные в `$set`, у каждого объекта `$className`, соответствующего `$criteria`, без загрузки объектов в память. Возвращает количество затронутых строк либо `false` в случае ошибки.

## Синтаксис

```php
integer|boolean updateCollection (string $className, array $set, [mixed $criteria = null])
```

## Пример

```php
$xpdo->updateCollection('modResource', array('published' => 0), array('parent' => 12));
```

## Смотрите также

-   [xPDOObject.save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "xPDOObject.save")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")