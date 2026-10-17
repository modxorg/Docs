---
title: "_loadInstance"
description: "Эта функция отвечает за превращение строки набора результатов в экземпляр xPDOObject соответствующего класса."
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadinstance"
---

## xPDOObject::\_loadInstance()

Эта функция отвечает за превращение строки набора результатов в экземпляр `xPDOObject` соответствующего класса.

## Синтаксис

```php
static xPDOObject|null _loadInstance(
   xPDO &$xpdo,
   string $className,
   mixed $criteria,
   array $row
)
```
