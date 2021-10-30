---
title: "xPDO.getCollection"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection"
---

## xPDO::getCollection

Извлекает коллекцию `xPDOObjects` по указанному `xPDOCriteria`.

Если ничего не найдено, возвращает пустой массив.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getCollection()>

```php
array getCollection (string $className, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

Помните, что если вы используете карту xPDO и файлы классов, которые были сгенерированы из схемы XML, имя класса **не** совпадает с именем вашей таблицы. Если сомневаетесь, взгляните на XML-файл схемы, например,

```xml
<object class="MyClassName" table="my_class_name" extends="xPDOObject">
```

## Примеры

Получить коллекцию объектов Box шириной 40.

```php
$boxes = $xpdo->getCollection('Box',array(
   'width' => 40,
));
```

### Get Pages

Часто `getCollection` используется внутри сниппетов MODX, поэтому вы будете вызывать его через объект `$modx`, и вы будете получать встроенные коллекции объектов MODX, например страницы.

```php
$pages = $modx->getCollection('modResource', array('template' => 3));
```

**Знай свои объекты!**
Помните, что вам нужно вызывать коллекцию по имени объекта. Возможно, вам будет удобно держать открытым файл `core/model/schema/modx.mysql.schema.xml`, чтобы вы могли просматривать имена ваших объектов, например, `modResource` для страниц или `modChunk` для чанков и т.д.

## Смотрите также

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
-   [xPDO.getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject")
-   [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
-   [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
-   [xPDO](extending-modx/xpdo "xPDO")
