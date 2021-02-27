---
title: "_loadCollectionInstance"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadcollectioninstance"
---

## xPDOObject::\_loadCollectionInstance()

Эта функция отвечает за загрузку экземпляра `xPDOObject` в коллекцию.

## Синтаксис

API Doc: [\_loadCollectionInstance](http://api.modx.com/xpdo/om/xPDOObject.html#_loadCollectionInstance)

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
