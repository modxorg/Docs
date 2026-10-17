---
title: "xPDO.toCache"
description: "Store an object in the cache by signature."
_old_id: "1842"
_old_uri: "2.x/class-reference/xpdo/xpdo.tocache"
---

## xPDO::toCache

Stores an object or value in the cache under the given signature, with an optional lifetime in seconds (`0` means no expiry).

## Syntax

``` php
boolean toCache (string $signature, mixed $object, [integer $lifetime = 0], [array $options = array()])
```

## Example

``` php
$xpdo->toCache($signature, $collection, 3600);
```

## See Also

- [xPDO.fromCache](extending-modx/xpdo/class-reference/xpdo/xpdo.fromcache "xPDO.fromCache")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")