---
title: "xPDOQuery.from"
description: "Set the table (class) the query selects from."
_old_id: "1879"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.from"
---

## xPDOQuery::from

Sets the class (and therefore the table) the query selects from, optionally with an alias. This overrides the class given to `newQuery()`.

## Syntax

``` php
xPDOQuery from (string $class, [string $alias = ''])
```

## Example

``` php
$query = $xpdo->newQuery('Box');
$query->from('Box', 'B');
```

## See Also

- [xPDOQuery.setClassAlias](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.setclassalias "xPDOQuery.setClassAlias")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")