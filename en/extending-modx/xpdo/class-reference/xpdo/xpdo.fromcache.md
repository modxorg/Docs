---
title: "xPDO.fromCache"
description: "Get an object from the cache by signature."
_old_id: "1841"
_old_uri: "2.x/class-reference/xpdo/xpdo.fromcache"
---

## xPDO::fromCache

Retrieves a cached object or collection by its cache signature. Returns the cached value, or `null` if nothing is stored under that signature.

## Syntax

``` php
mixed fromCache (string $signature, [string $class = ''], [array $options = array()])
```

## Example

``` php
$data = $xpdo->fromCache($signature);
```

## See Also

- [xPDO.toCache](extending-modx/xpdo/class-reference/xpdo/xpdo.tocache "xPDO.toCache")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")