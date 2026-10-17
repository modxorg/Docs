---
title: "xPDOCacheManager.refresh"
_old_id: "1919"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.refresh"
---

## xPDOCacheManager::refresh

Refreshes the cache by rebuilding each provider. In plain xPDO this clears the cache providers; inside MODX the method is overridden by `modCacheManager`, which also rebuilds the partition map and fires the `OnCacheUpdate` event.

## Syntax

``` php
array refresh ([array $providers = array()], [array &$results = array()])
```

## Example

``` php
$results = $cacheManager->refresh();
```

## See Also

- [clean](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.clean "clean")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")