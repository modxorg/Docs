---
title: "xPDOCache"
translation: "extending-modx/xpdo/class-reference/xpdocache"
---

`xPDO\Cache\xPDOCache` — абстрактный базовый класс для провайдеров кеша. Провайдер реализует фактическое хранение записей кеша — в файловой системе, в памяти, в APC, в Redis и так далее, — а менеджер кеша направляет вызовы нужному провайдеру. В составе xPDO поставляются провайдеры `xPDOFileCache`, `xPDOMemCache`, `xPDOMemCached`, `xPDOAPCCache`, `xPDORedisCache` и `xPDOWinCache`.

1. [xPDOCache.getCacheKey](extending-modx/xpdo/class-reference/xpdocache/xpdocache.getcachekey)
2. [xPDOCache.flush](extending-modx/xpdo/class-reference/xpdocache/xpdocache.flush)
3. [xPDOCache.getOption](extending-modx/xpdo/class-reference/xpdocache/xpdocache.getoption)
4. [xPDOCache.isInitialized](extending-modx/xpdo/class-reference/xpdocache/xpdocache.isinitialized)

## Смотрите также

-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
-   [Caching](extending-modx/xpdo/caching "Caching")