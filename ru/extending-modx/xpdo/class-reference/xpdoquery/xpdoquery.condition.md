---
title: "xPDOQuery.condition"
description: "Добавляет условие в запрос для указанной цели."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.condition"
---

## xPDOQuery::condition

Добавляет условие в запрос для указанной цели (`where`, `having` или `on`). Это низкоуровневый метод, лежащий в основе [where()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where") и [having()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.having "xPDOQuery.having"); отдавайте им предпочтение, если только вам не нужно обратиться к конкретной секции.

## Синтаксис

``` php
xPDOQuery condition (array &$target, [mixed $conditions = '1'], [string $conjunction = xPDOQuery::SQL_AND], [mixed $binding = null], [integer $condGroup = 0])
```

## Пример

``` php
$query = $xpdo->newQuery('Box');
$query->condition($query->query['where'], array('width:>' => 10));
```

## Смотрите также

-   [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")
-   [xPDOQuery.having](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.having "xPDOQuery.having")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")