---
title: "getMany"
translation: "extending-modx/xpdo/class-reference/xpdoobject/related-object-accessors/getmany"
---

## xPDOObject::getMany()

Получает коллекцию объектов, связанных агрегатными или составными отношениями.

## Синтаксис

API Docs: [xPDOObject::getMany()](<http://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#%5CxPDOObject::getMany()>)

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
