---
title: "getGraph"
translation: "extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getgraph"
---

## xPDOObject::getGraph

Загружает граф связанных объектов в текущий объект. Аргумент `$graph` управляет глубиной загрузки:

-   `true` (по умолчанию) — весь граф связей до максимальной глубины.
-   целое число — связанные объекты до этой глубины.
-   строка JSON — определение графа в том же виде, что используется в `getCollectionGraph()`.
-   массив — определение графа в виде массива.

Возвращает загруженный граф либо `false`, если ничего не загружено.

## Синтаксис

```php
array|boolean getGraph ([boolean|string|array|integer $graph = true], [mixed $criteria = null], [boolean|integer $cacheFlag = true])
```

## Пример

```php
$resource = $modx->getObject('modResource', 42);
$graph = $resource->getGraph('{"Template":{},"TemplateVarResources":{"TemplateVar":{}}}');
```

## Смотрите также

-   [xPDO.getGraph](extending-modx/xpdo/class-reference/xpdo/xpdo.getgraph "xPDO.getGraph")
-   [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")