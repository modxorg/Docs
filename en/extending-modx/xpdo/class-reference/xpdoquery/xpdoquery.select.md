---
title: "xPDOQuery.select"
description: "Specify columns to return from the SQL query."
_old_id: "1297"
_old_uri: "2.x/class-reference/xpdoquery/xpdoquery.select"
---

## xPDOQuery::select

Specify columns to return from the SQL query.

## Syntax

``` php
xPDOQuery select ([string|array $columns = '*'])
```

Pass either a comma-separated string or an array of column names. `'*'` is expanded into the full prefixed column list of the class, so a joined query can hydrate every object. To limit the result set, pass the output of [getSelectColumns](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getselectcolumns "getSelectColumns"), which returns a comma-delimited string.

Always include the primary key of the table. Without it xPDO cannot key the objects it hydrates, and lazy-loading repeats until PHP stops on the nesting limit.

## Example

Get a collection of Boxes, with only the ID and name fields.

``` php
$query = $xpdo->newQuery('Box');
$query->select($xpdo->getSelectColumns('Box','Box','',array('id','name')));
$boxes = $xpdo->getCollection('Box',$query);
```

## Use with toArray()

`toArray()` lazy-loads missing fields by default, so it prints more than `select()` asked for. Set the third parameter to `true` to limit the array to the selected fields.

``` php
$query = $xpdo->newQuery('modUser');
$query->select('id,username');
$users = $xpdo->getCollection('modUser',$query);
foreach ($users as $u) {
    print_r($u->toArray()); // will print ALL fields.
    print_r($u->toArray('',false,true)); // will print ONLY the selected fields.
}
```

## See Also

- [getSelectColumns](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getselectcolumns "getSelectColumns")
- [xPDOExpression](extending-modx/xpdo/class-reference/xpdoexpression "xPDOExpression")
- [xPDOQuery](extending-modx/xpdo/class-reference/xpdoquery "xPDOQuery")