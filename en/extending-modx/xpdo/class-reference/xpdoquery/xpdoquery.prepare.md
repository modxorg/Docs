---
title: "xPDOQuery.prepare"
description: "Prepare the query for execution."
_old_id: "1885"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.prepare"
---

## xPDOQuery::prepare

Prepares the query for execution by building its SQL string. Call this before `toSQL()` when debugging, or when you want the generated SQL before running the query.

## Syntax

``` php
xPDOQuery prepare ([array $bindings = array()], [boolean $byValue = true], [boolean|integer $cacheFlag = null])
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->where(array('width:>' => 10));
$query->prepare();
echo $query->toSQL();
```

## See Also

- [xPDOCriteria.toSQL](extending-modx/xpdo/class-reference/xpdocriteria/xpdocriteria.tosql "xPDOCriteria.toSQL")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")