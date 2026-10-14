---
title: "_loadCollectionInstance"
description: "Эта функция отвечает за загрузку экземпляра xPDOObject в коллекцию."
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadcollectioninstance"
---

## xPDOObject::\_loadCollectionInstance()

Эта функция отвечает за загрузку экземпляра `xPDOObject` в коллекцию.

## Синтаксис

```php
static boolean _loadCollectionInstance(
   xPDO &$xpdo,
   array &$objCollection,
   string $className,
   mixed $criteria,
   array $row,
   boolean $fromCache,
   boolean|integer $cacheFlag
)
```
