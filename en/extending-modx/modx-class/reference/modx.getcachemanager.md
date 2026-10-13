---
title: "modX.getCacheManager"
description: "Get an extended xPDOCacheManager instance responsible for MODX caching."
_old_id: "1060"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getcachemanager"
---

## modX::getCacheManager

Get an extended `xPDOCacheManager` instance responsible for MODX caching.

Overrides `xPDO::getCacheManager`.

## Syntax

``` php
modCacheManager getCacheManager([string $class = 'xPDO\Cache\xPDOCacheManager'], [array $options = array('path' => XPDO_CORE_PATH, 'ignorePkg' => true)])
```

- `$class` _(string)_ Ignored in `modX`: the class comes from the `modCacheManager.class` system setting (default `MODX\Revolution\modCacheManager`)
- `$options` _(array)_ Ignored in `modX`; both arguments only affect the parent `xPDO::getCacheManager`

The method returns the shared `modCacheManager` instance registered for this `modX` object, creating it on first use.

## Example

Get the Cache Manager to set a dummy cache file.

``` php
$cacheManager = $modx->getCacheManager();
$cacheManager->set('testcachefile','test123');
```

## See Also

- [Caching](extending-modx/xpdo/caching "Caching")
- [modX](extending-modx/core-model/modx "modX")
