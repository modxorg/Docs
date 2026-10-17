---
title: "xPDOCacheManager.getOption"
_old_id: "1911"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.getoption"
---

## xPDOCacheManager::getOption

Gets an option value from the cache manager's options, falling back to a default. Cache options are usually passed per call rather than set on the manager.

## Syntax

``` php
mixed getOption (string $key, [array $options = array()], [mixed $default = null])
```

## Example

``` php
$path = $cacheManager->getOption(xPDO::OPT_CACHE_PATH, $options, MODX_CORE_PATH . 'cache/');
```

## See Also

- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")