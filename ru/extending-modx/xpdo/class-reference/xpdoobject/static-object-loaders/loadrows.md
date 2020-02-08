---
title: "_loadRows"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadrows"
---

## xPDOObject::\_loadRows()

Эта функция отвечает за загрузку набора результатов из базы данных и возврат объекта `PDOStatement`, представляющего набор результатов.

## Синтаксис

API Doc: [\_loadRows](http://api.modx.com/xpdo/om/xPDOObject.html#_loadRows)

```php
static PDOStatement|null _loadRows(
   xPDO &$xpdo,
   string $className,
   mixed $criteria
)
```
