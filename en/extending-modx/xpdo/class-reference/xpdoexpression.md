---
title: "xPDOExpression"
_old_id: "1806"
_old_uri: "2.x/class-reference/xpdoexpression"
---

`xPDO\Om\xPDOExpression` is an immutable value object that wraps a raw SQL fragment so xPDO can inline it verbatim instead of binding it as a parameter. Use it wherever `xPDOQuery` accepts a column value or a `SELECT` entry when you need a SQL expression — a function call (`NOW()`, `CURRENT_TIMESTAMP`), an arithmetic expression (`counter + 1`), or an aggregate with an alias (`COUNT(*) AS total`). Valid contexts include `SET`, `SELECT`, `WHERE`, `HAVING`, `GROUP BY`, and `ORDER BY`.

The expression is embedded without quoting, escaping, or parameterisation, so keeping it safe is the caller's responsibility.

> [!WARNING]
> Never pass unsanitised user input to `xPDOExpression` or to [xPDO::expression()](extending-modx/xpdo/class-reference/xpdo/xpdo.expression "xPDO.expression"). The string is inserted into the generated SQL as-is and can lead to SQL injection.

## Creating an Expression

The class is `final`; build instances with the [xPDO::expression()](extending-modx/xpdo/class-reference/xpdo/xpdo.expression "xPDO.expression") factory:

``` php
$expr = $xpdo->expression('NOW()');
```

## Examples

Sort by a raw expression:

``` php
$query = $xpdo->newQuery('modResource');
$query->sortby($xpdo->expression('COUNT(*)'), 'DESC');
```

Use an expression as a bound value in `WHERE`:

``` php
$query = $xpdo->newQuery('modResource');
$query->where(array(
    'createdon:<=' => $xpdo->expression('NOW()'),
));
```

## See Also

- [xPDO.expression](extending-modx/xpdo/class-reference/xpdo/xpdo.expression "xPDO.expression")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")
- [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby")