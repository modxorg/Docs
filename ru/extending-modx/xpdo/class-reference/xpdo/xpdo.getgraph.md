---
title: "xPDO.getGraph"
description: "Строит граф связанных классов для класса."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getgraph"
---

## xPDO::getGraph

Обходит агрегатные и композиционные отношения класса и возвращает вложенный граф связанных классов до заданной глубины. Это та же карта, на которой построены `getCollectionGraph()` и `getGraph()` объекта.

## Синтаксис

```php
array getGraph (string $className, [integer $depth = 3], [array &$parents = array()], [array &$visited = array()])
```

-   `$className` — класс, с которого начинается обход.
-   `$depth` — сколько уровней отношений включать.
-   `$parents` / `$visited` — внутренние служебные массивы, предотвращающие зацикливание.

## Пример

```php
$graph = $xpdo->getGraph('modResource', 2);
print_r($graph);
```

## Смотрите также

-   [xPDOObject.getGraph](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getgraph "xPDOObject.getGraph")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")