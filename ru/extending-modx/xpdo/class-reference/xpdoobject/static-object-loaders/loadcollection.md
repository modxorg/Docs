---
title: "loadCollection"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadcollection"
---

## xPDOObject::loadCollection()

Эта функция отвечает за загрузку коллекции экземпляров объектов из **строк** в таблице базы данных, представленной определенным классом.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#loadCollection>

```php
static array loadCollection(
    xPDO &$xpdo,
    string $className,
    [mixed $criteria = null],
    [boolean|integer $cacheFlag = true]
)
```
