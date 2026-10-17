---
title: "xPDO.setAttribute"
description: "Set a PDO connection attribute."
_old_id: "1857"
_old_uri: "2.x/class-reference/xpdo/xpdo.setattribute"
---

## xPDO::setAttribute

Sets a PDO connection attribute, such as `PDO::ATTR_ERRMODE` or `PDO::ATTR_DEFAULT_FETCH_MODE`. Returns `true` on success, `false` on failure.

## Syntax

``` php
boolean setAttribute (integer $attribute, mixed $value)
```

## Example

``` php
$xpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
```

## See Also

- [xPDO.getAttribute](extending-modx/xpdo/class-reference/xpdo/xpdo.getattribute "xPDO.getAttribute")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")