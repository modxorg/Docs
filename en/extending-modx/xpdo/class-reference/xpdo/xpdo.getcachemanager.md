---
title: "xPDO.getCacheManager"
description: "Get the cache manager instance."
_old_id: "1840"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcachemanager"
---

## xPDO::getCacheManager

Returns the cache manager instance used by the xPDO instance. The default class is `xPDO\Cache\xPDOCacheManager`; inside MODX this is replaced by `MODX\Revolution\modCacheManager`.

## Syntax

``` php
xPDO\Cache\xPDOCacheManager getCacheManager ([string $class = 'xPDO\\Cache\\xPDOCacheManager'], [array $options = array('path' => XPDO_CORE_PATH, 'ignorePkg' => true)])
```

## Example

``` php
$cacheManager = $xpdo->getCacheManager();
$cacheManager->set('mykey', $value);
```

## See Also

- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")