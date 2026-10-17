---
title: "xPDOQuery.distinct"
description: "Set or clear the DISTINCT flag on the query."
_old_id: "1877"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.distinct"
---

## xPDOQuery::distinct

Sets or clears the `DISTINCT` flag on the query. Pass `true` (or a truthy value) to select distinct rows, or `false`/`null` to clear it. Called without an argument, it toggles the current flag.

## Syntax

``` php
xPDOQuery distinct ([mixed $on = null])
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->distinct(true);
```

## See Also

- [xPDOQuery.select](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select "xPDOQuery.select")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")