---
title: "xPDOQuery.isConditionalClause"
description: "Check whether a string is a conditional clause."
_old_id: "1884"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.isconditionalclause"
---

## xPDOQuery::isConditionalClause

Determines whether a string represents a conditional clause — that is, whether it contains an operator and should be parsed into a condition rather than treated as a plain value or column.

## Syntax

``` php
boolean isConditionalClause (string $string)
```

## Example

``` php
if ($query->isConditionalClause('width:>')) {
    // treated as a condition
}
```

## See Also

- [xPDOQuery.where](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.where "xPDOQuery.where")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")