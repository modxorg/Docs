---
title: "xPDO.getDriverClass"
description: "Get the driver-specific class for a base class."
_old_id: "1863"
_old_uri: "2.x/class-reference/xpdo/xpdo.getdriverclass"
---

## xPDO::getDriverClass

Returns the fully-qualified name of the driver-specific class for a given base class. For example, the driver class of `xPDO\Om\xPDOManager` on MySQL is `xPDO\Om\mysql\xPDOManager`.

## Syntax

``` php
string getDriverClass (string $class)
```

## Example

``` php
$managerClass = $xpdo->getDriverClass('xPDO\\Om\\xPDOManager');
```

## See Also

- [xPDO.getPlatformClass](extending-modx/xpdo/class-reference/xpdo/xpdo.getplatformclass "xPDO.getPlatformClass")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")