---
title: "xPDO.quote"
description: "Quote a string for use in an SQL statement."
_old_id: "1858"
_old_uri: "2.x/class-reference/xpdo/xpdo.quote"
---

## xPDO::quote

Quotes a string for use in an SQL statement, escaping it according to the current driver. Prefer prepared statements with bound parameters; use this only when you must build raw SQL.

## Syntax

``` php
string|boolean quote (string $string, [integer $parameter_type = PDO::PARAM_STR])
```

- `$string` — the value to quote.
- `$parameter_type` — the PDO parameter type, `PDO::PARAM_STR` by default or `PDO::PARAM_INT` for integers.

## Example

``` php
$username = $xpdo->quote($username);
$sql = "SELECT * FROM users WHERE username = $username";
```

## See Also

- [xPDO.escape](extending-modx/xpdo/class-reference/xpdo/xpdo.escape "xPDO.escape")
- [xPDO.literal](extending-modx/xpdo/class-reference/xpdo/xpdo.literal "xPDO.literal")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")