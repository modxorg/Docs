---
title: "xPDO.newQuery"
_old_id: "1252"
_old_uri: "2.x/class-reference/xpdo/xpdo.newquery"
---

## xPDO::newQuery

Creates an new `xPDOQuery` for a specified `xPDOObject` class.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::newQuery()>

``` php
xPDOQuery newQuery (string $class, [mixed $criteria = null], [boolean|integer $cacheFlag = true])
```

**Valid Class**
The string you pass as the class name should be a _valid object class name_. It'll be the same name you use moments later with your call to [getObject](extending-modx/xpdo/class-reference/xpdo/xpdo.getobject "xPDO.getObject"), [getObjectGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getobjectgraph "xPDO.getObjectGraph"), [getCollection](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollection "xPDO.getCollection"), or [getCollectionGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getcollectiongraph "xPDO.getCollectionGraph").

## Examples

Create a new Query for the Box object:

``` php
$xpdo->newQuery('Box');
```

Create a new Query for the Box object, but already add a WHERE clause limiting to Boxes with width greater than 10:

``` php
$xpdo->newQuery('Box',array(
   'width:>' => 10,
));
```

## See Also

- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
- [xPDO](extending-modx/xpdo "xPDO")
