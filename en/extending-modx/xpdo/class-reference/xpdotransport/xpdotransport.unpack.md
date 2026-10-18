---
title: "xPDOTransport.unpack"
_old_id: "1942"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.unpack"
---

## xPDOTransport::unpack

Unpacks a transport archive from one location into another. The `$state` argument indicates whether the archive is packed or already unpacked.

## Syntax

``` php
boolean unpack (xPDO &$xpdo, string $from, string $to, [integer $state = xPDOTransport::STATE_PACKED])
```

## Example

``` php
xPDOTransport::unpack($xpdo, MODX_CORE_PATH . 'packages/my_package.transport.zip', MODX_CORE_PATH . 'packages/');
```

## See Also

- [xPDOTransport.retrieve](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.retrieve "xPDOTransport.retrieve")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")