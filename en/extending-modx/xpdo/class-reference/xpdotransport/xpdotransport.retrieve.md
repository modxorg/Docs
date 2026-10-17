---
title: "xPDOTransport.retrieve"
_old_id: "1941"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.retrieve"
---

## xPDOTransport::retrieve

Downloads or copies a transport archive from a source location to a target location. The `$state` argument indicates whether the source is packed or unpacked.

## Syntax

``` php
boolean retrieve (xPDO &$xpdo, string $source, string $target, [integer $state = xPDOTransport::STATE_PACKED])
```

## Example

``` php
xPDOTransport::retrieve($xpdo, 'https://example.com/my_package.transport.zip', MODX_CORE_PATH . 'packages/');
```

## See Also

- [xPDOTransport.unpack](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.unpack "xPDOTransport.unpack")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")