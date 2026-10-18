---
title: "xPDOCache.isInitialized"
_old_id: "1924"
_old_uri: "2.x/class-reference/xpdocache/xpdocache.isinitialized"
---

## xPDOCache::isInitialized

Indicates whether the cache provider has been successfully initialised and is ready to store and retrieve entries.

## Syntax

``` php
boolean isInitialized ()
```

## Example

``` php
if ($provider->isInitialized()) {
    // safe to use the provider
}
```

## See Also

- [xPDOCache](extending-modx/xpdo/class-reference/xpdocache "xPDOCache")