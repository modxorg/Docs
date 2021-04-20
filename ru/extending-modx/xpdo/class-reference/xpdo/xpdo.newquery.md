---
title: "xPDO.newQuery"
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.newquery"
---

## xPDO::newQuery

Создает новый `xPDOQuery` для указанного класса `xPDOObject`.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::newQuery()>

```php
xPDOQuery newQuery (string $class, [mixed $criteria = null], [boolean|integer $cacheFlag = true])
```

**Действительный класс**
Строка, которую вы передаете как имя класса, должна быть допустимым именем класса объекта. Это будет то же имя, которое вы используете через несколько секунд, когда вызываете [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject"), [getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph"), [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection"), или [getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph").

## Примеры

Создайте новый запрос для объекта Box:

```php
$xpdo->newQuery('Box');
```

Создайте новый Query для объекта Box, но уже добавьте предложение `WHERE`, ограничивающее Boxes шириной более 10:

```php
$xpdo->newQuery('Box',array(
   'width:>' => 10,
));
```

## Смотрите также

-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
-   [xPDO](extending-modx/xpdo "xPDO")
