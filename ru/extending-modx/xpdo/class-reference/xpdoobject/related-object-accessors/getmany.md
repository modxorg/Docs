---
title: "getMany"
description: "Получает коллекцию объектов, связанных агрегатными или составными отношениями."
translation: "extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany"
---

## xPDOObject::getMany()

Получает коллекцию объектов, связанных агрегатными или составными отношениями.

## Синтаксис

```php
array &getMany (
   string $alias,
   [object $criteria = null],
   [boolean|integer $cacheFlag = true]
)
```

## Пример

Получить все чанки в категории и вывести их имена.

```php
$category = $xpdo->getObject('Category',1);
$chunks = $category->getMany('Chunk');
foreach ($chunks as $chunk) {
   echo $chunk->get('name').'<br />';
}
```

## Смотрите также

-   [getOne](extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getone "getOne")
-   [Working with Related Objects](extending-modx/xpdo/retrieving-objects/related-objects "Working with Related Objects")
