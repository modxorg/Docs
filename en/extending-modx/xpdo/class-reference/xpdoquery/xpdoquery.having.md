---
title: "xPDOQuery.having"
description: "Add a HAVING clause to the query."
_old_id: "1881"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.having"
---

## xPDOQuery::having

Adds a `HAVING` clause to the query, used to filter grouped results after a `GROUP BY`. Without `having()`, you can group rows but cannot filter on the aggregate values.

## Syntax

``` php
xPDOQuery having (mixed $conditions)
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->groupby('color');
$query->having(array('COUNT(*):>' => 5));
```

## See Also

- [xPDOQuery.groupby](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.groupby "xPDOQuery.groupby")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")