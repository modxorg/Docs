---
title: "xPDOQuery.isConditionalClause"
description: "Проверяет, является ли строка условной секцией."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.isconditionalclause"
---

## xPDOQuery::isConditionalClause

Определяет, представляет ли строка условную секцию — то есть содержит ли она оператор и должна быть разобрана в условие, а не обработана как обычное значение или имя столбца.

## Синтаксис

``` php
boolean isConditionalClause (string $string)
```

## Пример

``` php
if ($query->isConditionalClause('width:>')) {
    // treated as a condition
}
```

## Смотрите также

-   [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")