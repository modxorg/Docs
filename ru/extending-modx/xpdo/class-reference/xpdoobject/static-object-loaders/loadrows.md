---
title: "_loadRows"
description: "Эта функция отвечает за загрузку набора результатов из базы данных и возврат объекта PDOStatement, представляющего набор результатов."
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadrows"
---

## xPDOObject::\_loadRows()

Эта функция отвечает за загрузку набора результатов из базы данных и возврат объекта `PDOStatement`, представляющего набор результатов.

## Синтаксис

```php
static PDOStatement|null _loadRows(
   xPDO &$xpdo,
   string $className,
   mixed $criteria
)
```
