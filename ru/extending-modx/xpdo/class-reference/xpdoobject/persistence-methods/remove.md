---
title: "remove"
description: "Удаляет постоянный экземпляр объекта навсегда."
translation: "extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove"
---

## xPDOObject::remove()

Удаляет постоянный экземпляр объекта навсегда. Это удаляет строки из базы данных.

## Синтаксис

```php
boolean remove ([array $ancestors = array ()])
```

## Примеры

Избавитьсь от предмета.

```php
$item = $xpdo->getObject('Item',123);

if ($item->remove() == false) echo 'The Item failed to remove.';
```

## Смотрите также

-   [Removing Objects](extending-modx/xpdo/removing-objects)
-   [save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save)
