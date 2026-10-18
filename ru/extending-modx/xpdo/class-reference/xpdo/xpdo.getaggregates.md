---
title: "xPDO.getAggregates"
description: "Получает определённые для класса агрегатные связи по внешнему ключу."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getaggregates"
---

## xPDO::getAggregates

Возвращает определения агрегатных связей класса, сгруппированные по алиасу связи. Агрегатная связь указывает на связанный объект, чей внешний ключ находится в самом связанном объекте (связь «один к одному» или «один ко многим», где текущий класс является владельцем).

## Синтаксис

``` php
array getAggregates (string $className)
```

## Пример

``` php
$aggregates = $xpdo->getAggregates('modResource');
print_r($aggregates['Template']);
```

## Смотрите также

-   [xPDO.getComposites](extending-modx/xpdo/class-reference/xpdo/xpdo.getcomposites "xPDO.getComposites")
-   [xPDO.getFKDefinition](extending-modx/xpdo/class-reference/xpdo/xpdo.getfkdefinition "xPDO.getFKDefinition")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")