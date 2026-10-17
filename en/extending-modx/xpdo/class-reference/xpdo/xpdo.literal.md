---
title: "xPDO.literal"
description: "Escape a value for use as a literal in SQL."
_old_id: "1844"
_old_uri: "2.x/class-reference/xpdo/xpdo.literal"
---

## xPDO::literal

Escapes a value for use as a string literal in SQL. This is a lower-level helper used when building raw SQL; prefer prepared statements and bound parameters wherever possible.

## Syntax

``` php
string literal (string $string)
```

## Example

``` php
$sql = 'SELECT * FROM my_table WHERE name = ' . $xpdo->literal($name);
```

## See Also

- [xPDO.escape](extending-modx/xpdo/class-reference/xpdo/xpdo.escape "xPDO.escape")
- [xPDO.quote](extending-modx/xpdo/class-reference/xpdo/xpdo.quote "xPDO.quote")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")