---
title: "xPDOQuery.set"
description: "Задаёт значения столбцов для запроса UPDATE."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.set"
---

## xPDOQuery::set

Задаёт значения, которые должны быть записаны запросом `UPDATE`. Запрос должен быть в режиме `UPDATE` (см. [command()](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.command "xPDOQuery.command")); значения объединяются с условиями `WHERE`, построенными через `where()`.

## Синтаксис

``` php
xPDOQuery set (array $values)
```

## Пример

``` php
$query = $xpdo->newQuery('Box');
$query->command('UPDATE');
$query->set(array('color' => 'blue'));
$query->where(array('width:<' => 10));
$xpdo->exec($query->toSQL());
```

## Смотрите также

-   [xPDOQuery.command](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.command "xPDOQuery.command")
-   [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")