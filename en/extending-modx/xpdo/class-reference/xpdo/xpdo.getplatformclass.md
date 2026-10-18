---
title: "xPDO.getPlatformClass"
description: "Get the platform-specific class for a domain class."
_old_id: "1864"
_old_uri: "2.x/class-reference/xpdo/xpdo.getplatformclass"
---

## xPDO::getPlatformClass

Returns the fully-qualified name of the platform-specific class for a given domain class. The platform class holds the static metadata map (`$metaMap`) for the class on the current database platform.

## Syntax

``` php
string getPlatformClass (string $domainClass)
```

## Example

``` php
$platformClass = $xpdo->getPlatformClass('MODX\\Revolution\\modResource');
```

## See Also

- [xPDO.getDriverClass](extending-modx/xpdo/class-reference/xpdo/xpdo.getdriverclass "xPDO.getDriverClass")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")