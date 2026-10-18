---
title: "xPDOQuery.isValidClause"
description: "Check whether a string is a valid SQL clause."
_old_id: "1883"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.isvalidclause"
---

## xPDOQuery::isValidClause

Validates a string as an SQL clause. The check rejects strings containing a semicolon, the word `UNION` (case-insensitive), `sleep(N)` or `benchmark()`; everything else is accepted. This is why `sortby('RAND()')` works while an arbitrary string with a semicolon does not.

## Syntax

``` php
boolean isValidClause (string $clause)
```

## Example

``` php
if (xPDOQuery::isValidClause('RAND()')) {
    $query->sortby('RAND()');
}
```

## See Also

- [xPDOQuery.sortby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.sortby "xPDOQuery.sortby")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")