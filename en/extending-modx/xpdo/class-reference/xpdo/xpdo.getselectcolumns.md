---
title: "xPDO.getSelectColumns"
description: "Get a comma-delimited list of select columns for a class."
_old_id: "1809"
_old_uri: "2.x/class-reference/xpdo/xpdo.getselectcolumns"
---

## xPDO::getSelectColumns

Builds a comma-delimited list of the columns to select for a class, optionally qualified with a table alias and a column prefix. This is the list that `xPDOQuery::select()` expands when it receives `'*'`.

## Syntax

``` php
string getSelectColumns (string $className, [string $tableAlias = ''], [string $columnPrefix = ''], [array $columns = array()], [boolean $exclude = false])
```

- `$className` — the class whose columns to list.
- `$tableAlias` — optional alias to qualify each column with.
- `$columnPrefix` — optional prefix added to each column name (used to avoid collisions when joining).
- `$columns` — an explicit list of columns; if empty, all fields of the class are used.
- `$exclude` — when true, the listed columns are excluded rather than selected.

## Example

``` php
$columns = $xpdo->getSelectColumns('Box', 'Box', 'Box_');
// Box.id, Box.name, Box.width, ...
```

## See Also

- [xPDOQuery.select](extending-modx/xpdo/class-reference/xpdoquery/xpdoquery.select "xPDOQuery.select")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")