---
title: "xPDOCache.flush"
_old_id: "1922"
_old_uri: "2.x/class-reference/xpdocache/xpdocache.flush"
---

## xPDOCache::flush

Removes all entries from the cache provider. Implementations of this abstract method are provider-specific.

## Syntax

``` php
boolean flush ([array $options = array()])
```

## Example

``` php
$provider->flush();
```

## See Also

- [xPDOCache](extending-modx/xpdo/class-reference/xpdocache "xPDOCache")