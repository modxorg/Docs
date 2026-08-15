---
title: "loadCollectionGraph"
translation: "extending-modx/xpdo/class-reference/xpdoobject/static-object-loaders/loadcollectiongraph"
---

## xPDOObject::loadCollectionGraph()

Эта функция отвечает за загрузку коллекции экземпляров объектов, а также связанных экземпляров объектов, указанных в «графе» класса, из таблиц, представленных определенным набором связанных классов.

## Синтаксис

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::loadCollectionGraph()>

```php
function loadCollectionGraph(& $xpdo, $className, $graph, $criteria, $cacheFlag)
```
