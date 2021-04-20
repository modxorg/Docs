---
title: "xPDO.getIterator"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator"
---

## xPDO::getIterator

Извлекает `xPDOIterator`, представляющий итеративную коллекцию `xPDOObjects` по указанному `xPDOCriteria`.

Используйте `xPDOIterator` для циклического перебора больших наборов результатов и работы с одним экземпляром за раз. Это значительно уменьшает использование памяти при одновременной загрузке всей коллекции объектов в память. Это также немного быстрее.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getIterator()>

```php
xPDOIterator getIterator (string $className, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

Помните, что если вы используете карту xPDO и файлы классов, которые были сгенерированы из схемы XML, имя класса **не** совпадает с именем вашей таблицы. Если сомневаетесь, взгляните на XML-файл схемы, например,

```xml
<object class="MyClassName" table="my_class_name" extends="xPDOObject">
```

## Пример

Получите итератор для коллекции объектов Box шириной 40.

```php
$boxes = $xpdo->getIterator('Box',array(
   'width' => 40,
));
foreach ($boxes as $idx => $box) {
    echo "Box #{$idx} has an id of {$box->get('id')} and a width of {$box->get('width')}\n";
}
```

Если не найдено ни одного соответствующего `xPDOObjects`, объект `xPDOIterator` будет пустым, но все равно будет объектом, поэтому следующее не будет работать (в отличие от [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")):

```php
// родитель -1 не существует, это преднамеренно =)
$resourceObjs = $xpdo->getIterator('modResource', array('parent' => -1));
if ($resourceObjs) { // то же самое касается if (!empty($resourceObjs)
     // это всегда будет работать, так как $resourceObjs никогда не бывает пустым
     // в том смысле, что мы интуитивно думаем о пустом
     // $resourceObjs содержит пустой объект xPDOIterator, но это не пустой массив!
}
// если вам действительно нужно проверить, есть ли что-то для повторения, вы можете сделать либо:
if ($xpdo->getCount('modResource', array('parent' => -1))) {
    // это не будет работать
}
// or
$resourceObjs->rewind();
if ($resourceObjs->valid()) {
    // это не будет работать
}
```

## Смотрите также

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO](extending-modx/xpdo "xPDO")
