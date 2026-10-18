---
title: "xPDOCacheManager.getCacheProvider"
description: "Get an instance of a provider which implements the xPDOCache interface."
_old_id: "1268"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider"
---

## xPDOCacheManager::getCacheProvider

Get an instance of a provider which implements the `xPDOCache` interface. Defaults to xPDOFileCache.

## Syntax

``` php
xPDOCache|null getCacheProvider ([ $key = ''], [ $options = array()])
```

## Example

``` php
$cacheManager = $xpdo->getCacheManager();
$provider = $cacheManager->getCacheProvider('default', array(xPDO::OPT_CACHE_HANDLER => 'xPDO\\Cache\\xPDOMemCached'));
```

## See Also

- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
