---
title: "xPDO.getAttribute"
description: "Get a PDO connection attribute."
_old_id: "1855"
_old_uri: "2.x/class-reference/xpdo/xpdo.getattribute"
---

## xPDO::getAttribute

Returns the value of a PDO connection attribute, such as `PDO::ATTR_DRIVER_NAME` or `PDO::ATTR_SERVER_VERSION`.

## Syntax

``` php
mixed getAttribute (integer $attribute)
```

## Example

``` php
$driver = $xpdo->getAttribute(PDO::ATTR_DRIVER_NAME);
```

## See Also

- [xPDO.setAttribute](extending-modx/xpdo/class-reference/xpdo/xpdo.setattribute "xPDO.setAttribute")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")