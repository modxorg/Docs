---
title: "modX.getFullTableName"
description: "Builds a database-qualified table name from the configured prefix"
---

## modX::getFullTableName

Joins the `dbname` option, a dot, the table prefix and `$table`. Meant for raw SQL against prefixed tables that have no xPDO model, such as migrations.

The result is neither quoted nor escaped. An empty `$table` returns only the database name with the prefix.

## Syntax

``` php
string getFullTableName ([string $table = ''])
```

- `$table` _(string)_ table name without the prefix, by default `''`

## Example

``` php
$table = $modx->getFullTableName('site_content');

// $table === 'modx.modx_site_content' with dbname 'modx' and prefix 'modx_'
$sql = "SELECT id FROM {$table} WHERE published = 1";
```

## See Also

- [modX](extending-modx/core-model/modx)
