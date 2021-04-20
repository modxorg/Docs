---
title: "xPDO.getObject"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getobject"
---

## xPDO::getObject

Извлекает один экземпляр объекта по заданным критериям.

Критериями могут быть значения первичного ключа, массив значений первичного ключа (для нескольких объектов первичного ключа) или объект `xPDOCriteria`. Если параметр `$ criterts` не указан, класс не найден или объект не может быть найден по предоставленным критериям, возвращается значение null.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::getObject()>

```php
xPDOObject|null getObject (string $className, [xPDOCriteria|array|str|int $criteria = null], [bool|int $cacheFlag = true])
```

## Пример

### Простейший пример (встроенные объекты)

Вы можете использовать `getObject` для извлечения ресурсов MODX (например, страницы) по ее идентификатору страницы:

```php
$page = $modx->getObject('modResource', 555);
$output = $page->get('pagetitle');
```

**xPDO против MODX**
Объект `$modx` расширяет xPDO, поэтому во многих ситуациях (например, внутри ваших фрагментов) вы можете использовать объект `$modx`, даже если в большинстве примеров на этой странице используется объект `$xpdo`.

Таким способом вы можете получить любой объект MODX, просто зная имя его объекта - обычно это просто вопрос добавления «мода» к знакомому имени объекта:

| Распространенное имя | Имя объекта                                                                                                                                                                         |
| -------------------- | ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| Page                 | modResource (Примечаниt: Page - это всего лишь одно из проявлений modResource. Это также можно использовать для получения веб-ссылок, символических ссылок и статических ресурсов.) |
| Chunk                | modChunk                                                                                                                                                                            |
| User                 | modUser                                                                                                                                                                             |
| Template             | modTemplate                                                                                                                                                                         |
| Snippet              | modSnippet                                                                                                                                                                          |

Смотри **core/model/schema/modx.mysql.schema.xml** файл для полного определения всех объектов MODX.

Если вам нужно получить другие атрибуты для этих объектов (например, TV для страницы), то вам, возможно, придется посмотреть на [getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")

### Простейший пример (пользовательские объекты)

Самый простой пример - когда вы получаете объект по его первичному ключу.

Например. получить объект Box с идентификатором 134.

```php
$box = $xpdo->getObject('Box', 134);
```

Возвращаясь в свою XML-схему, если ваш объект расширяет `xPDOSimpleObject`, столбец первичного ключа считается названным «id».

```xml
<object class="modPropertySet" table="property_set" extends="xPDOSimpleObject">
```

В противном случае ваша XML-схема сообщит вам, какой столбец является первичным ключом через узел _index alias="PRIMARY"_, например,

```xml
<object class="MyObject" table="my_object" extends="xPDOObject">
    <field key="object_id" dbtype="int" precision="11" phptype="integer" null="false" index="pk"  generated="native" />
    <!-- ... stuff here ... -->
    <index alias="PRIMARY" name="PRIMARY" primary="true" unique="true">
        <column key="object_id" collation="A" null="false" />
    </index>
</object>
```

### Более подробный простой пример

Вы также можете предоставить более подробные критерии для второго параметра, например,

```php
$box = $xpdo->getObject('Box', array('id'=>134));
```

### Другие столбцы

Вам не нужно извлекать данные только по первичному ключу, вы также можете искать по другим столбцам:

```php
$box = $xpdo->getObject('Box', array('color'=>'blue'));
```

### Комплексные критерии

Вы можете указать более сложные критерии выбора, используя [xPDO query](extending-modx/xpdo/class-reference/xpdo/xpdo.newquery "xPDO.newQuery"):

```php
$query = $modx->newQuery('MyObject');
$query->where( array('wheels:>=' => 3) );
$myobj = $xpdo->getObject('MyObject', $query);
```

## Смотрите также

-   [Retrieving Objects](extending-modx/xpdo/retrieving-objects "Retrieving Objects")
-   [xPDO.getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph")
-   [xPDO.getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection")
-   [xPDO.getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph")
-   [xPDO.getIterator](extending-modx/xpdo/class-reference/xpdo/xpdo.getiterator "xPDO.getIterator")
-   [xPDO.load](extending-modx/xpdo/class-reference/xpdo/xpdo.load "xPDO.load")
-   [xPDO.query](extending-modx/xpdo/class-reference/xpdo/xpdo.query "xPDO.query")
-   [xPDO](extending-modx/xpdo "xPDO")
