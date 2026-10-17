---
title: "loadCollectionGraph"
description: "Эта функция отвечает за загрузку коллекции экземпляров объектов, а также связанных экземпляров объектов, указанных в «графе» класса, из таблиц,…"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadcollectiongraph"
---

## xPDOObject::loadCollectionGraph()

Эта функция отвечает за загрузку коллекции экземпляров объектов, а также связанных экземпляров объектов, указанных в «графе» класса, из таблиц, представленных определенным набором связанных классов.

## Синтаксис

```php
static array loadCollectionGraph(xPDO &$xpdo, string $className, string|array $graph, mixed $criteria, boolean|integer $cacheFlag)
```
