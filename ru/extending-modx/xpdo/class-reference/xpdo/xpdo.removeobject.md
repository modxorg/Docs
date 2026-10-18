---
title: "xPDO.removeObject"
description: "Удаляет объект из базы данных."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.removeobject"
---

## xPDO::removeObject

Создаёт экземпляр класса, указанного в `$className`, и удаляет его по заданным критериям первичного ключа. Возвращает `true` при успехе и `false` при неудаче.

## Синтаксис

``` php
boolean removeObject (string $className, mixed $criteria)
```

## Пример

``` php
$xpdo->removeObject('modResource', 42);
```

## Смотрите также

-   [xPDO.removeCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.removecollection "xPDO.removeCollection")
-   [xPDOObject.remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove "xPDOObject.remove")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")