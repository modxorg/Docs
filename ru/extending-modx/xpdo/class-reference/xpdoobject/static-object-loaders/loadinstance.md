---
title: "_loadInstance"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadinstance"
---

## xPDOObject::\_loadInstance()

Эта функция отвечает за превращение строки набора результатов в экземпляр `xPDOObject` соответствующего класса.

## Синтаксис

API Doc: [\_loadInstance](http://api.modx.com/xpdo/om/xPDOObject.html#_loadInstance)

```php
static xPDOObject _loadInstance(
   xPDO &$xpdo,
   string $className,
   mixed $criteria,
   array $row
)
```
