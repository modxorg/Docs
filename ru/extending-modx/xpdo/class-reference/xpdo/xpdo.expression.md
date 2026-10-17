---
title: "xPDO.expression"
description: "Создаёт объект значения xPDOExpression, оборачивающий фрагмент SQL."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.expression"
---

## xPDO::expression

Создаёт `xPDO\Om\xPDOExpression`, оборачивающий сырой фрагмент SQL. Фрагмент подставляется дословно везде, где `xPDOQuery` принимает выражение, минуя привязку параметров и проверку на внедрение, применяемую к обычным строкам.

> [!WARNING]
> Выражение встраивается в сгенерированный SQL без экранирования и заключения в кавычки. Никогда не передавайте в этот метод данные, полученные от пользователя.

## Синтаксис

```php
xPDO\Om\xPDOExpression expression (string $expr)
```

## Пример

```php
$now = $xpdo->expression('NOW()');
$query = $xpdo->newQuery('modResource');
$query->where(array(
    'createdon:<=' => $now,
));
```

## Смотрите также

-   [xPDOExpression](extending-modx/xpdo/class-reference/xpdoexpression "xPDOExpression")
-   [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby")