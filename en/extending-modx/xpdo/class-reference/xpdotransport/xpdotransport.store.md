---
title: "xPDOTransport.store"
_old_id: "1944"
_old_uri: "2.x/class-reference/xpdotransport/xpdotransport.store"
---

## xPDOTransport::store

Stores the transport at the given location, writing its manifest and any preserved files. Returns `true` on success, `false` on failure.

## Syntax

``` php
boolean store (string $location)
```

## Example

``` php
$transport->store(MODX_CORE_PATH . 'packages/');
```

## See Also

- [xPDOTransport.pack](extending-modx/xpdo/class-reference/xpdotransport/xpdotransport.pack "xPDOTransport.pack")
- [xPDOTransport](extending-modx/xpdo/class-reference/xpdotransport "xPDOTransport")