---
title: "xPDOQuery.having"
description: "Добавляет к запросу секцию HAVING."
translation: "extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.having"
---

## xPDOQuery::having

Добавляет к запросу секцию `HAVING`, которая используется для фильтрации сгруппированных результатов после `GROUP BY`. Без `having()` вы можете группировать строки, но не можете фильтровать по агрегированным значениям.

## Синтаксис

```php
xPDOQuery having (mixed $conditions)
```

## Пример

```php
$query = $xpdo->newQuery('Box');
$query->groupby('color');
$query->having(array('COUNT(*):>' => 5));
```

## Смотрите также

-   [xPDOQuery.groupby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.groupby "xPDOQuery.groupby")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")