---
title: "load"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/load"
---

## xPDOObject::load()

Эта функция отвечает за загрузку одного экземпляра объекта из **строки** в таблице базы данных, представленной определенным классом.

## Синтаксис

API Doc: <http://api.modxcms.com/xpdo/om/xPDOObject.html#load>

```php
static object|null load(
   xPDO &$xpdo,
   string $className,
   mixed $criteria,
   [boolean|integer $cacheFlag = true]
)
```
