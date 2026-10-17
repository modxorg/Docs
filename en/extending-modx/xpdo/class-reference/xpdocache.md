---
title: "xPDOCache"
_old_id: "1920"
_old_uri: "2.x/class-reference/xpdocache"
---

`xPDO\Cache\xPDOCache` is the abstract base class for cache providers. A provider implements the actual storage of cache entries — file system, memory, APC, Redis, and so on — while the cache manager routes calls to the right provider. The concrete providers shipped with xPDO are `xPDOFileCache`, `xPDOMemCache`, `xPDOMemCached`, `xPDOAPCCache`, `xPDORedisCache` and `xPDOWinCache`.

1. [xPDOCache.getCacheKey](extending-modx/xpdo/class-reference/xpdocache/xpdocache.getcachekey)
2. [xPDOCache.flush](extending-modx/xpdo/class-reference/xpdocache/xpdocache.flush)
3. [xPDOCache.getOption](extending-modx/xpdo/class-reference/xpdocache/xpdocache.getoption)
4. [xPDOCache.isInitialized](extending-modx/xpdo/class-reference/xpdocache/xpdocache.isinitialized)

## See Also

- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
- [Caching](extending-modx/xpdo/caching "Caching")