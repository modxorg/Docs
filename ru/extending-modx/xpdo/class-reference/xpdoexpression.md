---
title: "xPDOExpression"
translation: "extending-modx/xpdo/class-reference/xpdoexpression"
---

`xPDO\Om\xPDOExpression` — неизменяемый объект-значение, оборачивающий фрагмент SQL, чтобы xPDO мог вставить его дословно вместо привязки в качестве параметра. Используйте его везде, где `xPDOQuery` принимает значение колонки или элемент `SELECT`, и вам нужно SQL-выражение: вызов функции (`NOW()`, `CURRENT_TIMESTAMP`), арифметическое выражение (`counter + 1`) или агрегат с псевдонимом (`COUNT(*) AS total`). Допустимые контексты — `SET`, `SELECT`, `WHERE`, `HAVING`, `GROUP BY` и `ORDER BY`.

Выражение подставляется без кавычек, экранирования и параметризации, поэтому безопасность остаётся на совести вызывающего.

> [!WARNING]
> Никогда не передавайте неочищенные пользовательские данные в `xPDOExpression` или в [xPDO::expression()](extending-modx/xpdo/class-reference/xpdo/xpdo.expression "xPDO.expression"). Строка вставляется в сгенерированный SQL как есть и может привести к SQL-инъекции.

## Создание выражения

Класс объявлен `final`; создавайте экземпляры с помощью фабрики [xPDO::expression()](extending-modx/xpdo/class-reference/xpdo/xpdo.expression "xPDO.expression"):

``` php
$expr = $xpdo->expression('NOW()');
```

## Примеры

Сортировка по сырому выражению:

``` php
$query = $xpdo->newQuery('modResource');
$query->sortby($xpdo->expression('COUNT(*)'), 'DESC');
```

Использование выражения как привязанного значения в `WHERE`:

``` php
$query = $xpdo->newQuery('modResource');
$query->where(array(
    'createdon:<=' => $xpdo->expression('NOW()'),
));
```

## Смотрите также

-   [xPDO.expression](extending-modx/xpdo/class-reference/xpdo/xpdo.expression "xPDO.expression")
-   [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
-   [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby")