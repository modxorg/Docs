---
title: "xPDOQuery.distinct"
description: "Устанавливает или сбрасывает флаг DISTINCT у запроса."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.distinct"
---

## xPDOQuery::distinct

Устанавливает или сбрасывает флаг `DISTINCT` у запроса. Передайте `true` (или любое истинное значение), чтобы выбирать только уникальные строки, либо `false`/`null`, чтобы сбросить флаг. Если вызвать без аргумента, он переключит текущее значение флага.

## Синтаксис

``` php
xPDOQuery distinct ([mixed $on = null])
```

## Пример

``` php
$query = $xpdo->newQuery('Box');
$query->distinct(true);
```

## Смотрите также

-   [xPDOQuery.select](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select "xPDOQuery.select")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")