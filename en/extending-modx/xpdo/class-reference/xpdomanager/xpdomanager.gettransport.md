---
title: "xPDOManager.getTransport"
_old_id: "1899"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.gettransport"
---

## xPDOManager::getTransport

Returns the driver-specific [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport") instance for this connection. Transport objects package models and related files into transport archives and install them.

## Syntax

``` php
xPDOTransport|null getTransport ()
```

## Example

``` php
$manager = $xpdo->getManager();
$transport = $manager->getTransport('my_package', MODX_CORE_PATH . 'packages/');
```

## See Also

- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")