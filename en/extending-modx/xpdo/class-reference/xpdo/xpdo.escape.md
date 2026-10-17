---
title: "xPDO.escape"
description: "Escape a string for use as an identifier in SQL."
_old_id: "1843"
_old_uri: "2.x/class-reference/xpdo/xpdo.escape"
---

## xPDO::escape

Escapes an identifier (table or column name) for the current driver, wrapping it in the appropriate quote characters (backticks for MySQL, double quotes for most others). This is for identifiers only — to escape a value, use [quote()](extending-modx/xpdo/class-reference/xpdo/xpdo.quote "xPDO.quote").

## Syntax

``` php
string escape (string $string)
```

## Example

``` php
$sql = 'SELECT * FROM ' . $xpdo->escape('my_table');
```

## See Also

- [xPDO.literal](extending-modx/xpdo/class-reference/xpdo/xpdo.literal "xPDO.literal")
- [xPDO.quote](extending-modx/xpdo/class-reference/xpdo/xpdo.quote "xPDO.quote")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")