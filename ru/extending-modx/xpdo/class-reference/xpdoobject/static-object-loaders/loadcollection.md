---
title: "loadCollection"
description: "Эта функция отвечает за загрузку коллекции экземпляров объектов из строк в таблице базы данных, представленной определенным классом."
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadcollection"
---

## xPDOObject::loadCollection()

Эта функция отвечает за загрузку коллекции экземпляров объектов из **строк** в таблице базы данных, представленной определенным классом.

## Синтаксис

```php
static array loadCollection(
    xPDO &$xpdo,
    string $className,
    [mixed $criteria = null],
    [boolean|integer $cacheFlag = true]
)
```
