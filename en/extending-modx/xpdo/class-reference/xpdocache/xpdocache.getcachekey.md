---
title: "xPDOCache.getCacheKey"
_old_id: "1921"
_old_uri: "2.x/class-reference/xpdocache/xpdocache.getcachekey"
---

## xPDOCache::getCacheKey

Builds the physical cache key for a logical key by combining the cache partition (`xPDO::OPT_CACHE_KEY`) and the cache prefix (`xPDO::OPT_CACHE_PREFIX`) with the key itself. This is how entries are namespaced within a provider.

## Syntax

``` php
string getCacheKey (string $key, [array $options = array()])
```

## Example

``` php
$cacheKey = $provider->getCacheKey('mykey');
```

## See Also

- [xPDOCache](extending-modx/xpdo/class-reference/xpdocache "xPDOCache")