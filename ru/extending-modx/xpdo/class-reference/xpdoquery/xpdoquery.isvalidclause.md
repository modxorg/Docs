---
title: "xPDOQuery.isValidClause"
description: "Проверяет, является ли строка корректной SQL-конструкцией."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.isvalidclause"
---

## xPDOQuery::isValidClause

Проверяет строку на соответствие корректной SQL-конструкции. Проверка отклоняет строки, содержащие точку с запятой, слово `UNION` (без учёта регистра), `sleep(N)` или `benchmark()`; всё остальное принимается. Именно поэтому `sortby('RAND()')` работает, а произвольная строка с точкой с запятой — нет.

## Синтаксис

``` php
boolean isValidClause (string $clause)
```

## Пример

``` php
if (xPDOQuery::isValidClause('RAND()')) {
    $query->sortby('RAND()');
}
```

## Смотрите также

-   [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")