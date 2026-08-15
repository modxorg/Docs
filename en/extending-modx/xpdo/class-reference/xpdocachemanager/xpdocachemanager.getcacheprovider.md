---
title: "xPDOCacheManager.getCacheProvider"
_old_id: "1268"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider"
---

## xPDOCacheManager::getCacheProvider

Get an instance of a provider which implements the `xPDOCache` interface. Defaults to xPDOFileCache.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_cache_xpdocachemanager.class.html#\xPDOCacheManager::getCacheProvider()>

``` php
void &getCacheProvider ([ $key = ''], [ $options = array()])
```

## Example

``` php
$cacheManager = $xpdo->getCacheManager();
$provider = $cacheManager->getCacheProvider('xPDOMemCache');
```

## See Also

- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
