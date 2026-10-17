---
title: "xPDO.removeCollection"
description: "Удаляет коллекцию объектов из базы данных."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.removecollection"
---

## xPDO::removeCollection

Удаляет все объекты класса `$className`, соответствующие `$criteria`. Возвращает количество удалённых строк или `false` в случае ошибки.

## Синтаксис

```php
integer|boolean removeCollection (string $className, mixed $criteria)
```

## Пример

```php
$xpdo->removeCollection('modResource', array('parent' => 12));
```

## Смотрите также

-   [xPDO.removeObject](extending-modx/xpdo/class-reference/xpdo/xpdo.removeobject "xPDO.removeObject")
-   [xPDOObject.remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove "xPDOObject.remove")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")