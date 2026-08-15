---
title: "loadCollection"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadcollection"
---

## xPDOObject::loadCollection()

Эта функция отвечает за загрузку коллекции экземпляров объектов из **строк** в таблице базы данных, представленной определенным классом.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::loadCollection()>

```php
static array loadCollection(
    xPDO &$xpdo,
    string $className,
    [mixed $criteria = null],
    [boolean|integer $cacheFlag = true]
)
```
