---
title: "xPDO.expression"
description: "Create an xPDOExpression value object wrapping a raw SQL fragment."
_old_id: "1807"
_old_uri: "2.x/class-reference/xpdo/xpdo.expression"
---

## xPDO::expression

Creates an `xPDO\Om\xPDOExpression` that wraps a raw SQL fragment. The fragment is inlined verbatim wherever the expression is accepted by `xPDOQuery`, bypassing parameter binding and the injection check applied to plain strings.

> [!WARNING]
> The expression is embedded into the generated SQL without quoting or escaping. Never pass user-supplied input to this method.

## Syntax

``` php
xPDO\Om\xPDOExpression expression (string $expr)
```

## Example

``` php
$now = $xpdo->expression('NOW()');
$query = $xpdo->newQuery('modResource');
$query->where(array(
    'createdon:<=' => $now,
));
```

## See Also

- [xPDOExpression](extending-modx/xpdo/class-reference/xpdoexpression "xPDOExpression")
- [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby")