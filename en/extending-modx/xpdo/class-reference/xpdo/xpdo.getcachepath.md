---
title: "xPDO.getCachePath"
description: "Get the path where xPDO writes cache files."
_old_id: "1839"
_old_uri: "2.x/class-reference/xpdo/xpdo.getcachepath"
---

## xPDO::getCachePath

Returns the absolute path to the directory xPDO uses to write cache files. When `xPDO::OPT_CACHE_PATH` is not set, xPDO writes to a `.xpdo-cache` directory under the system temp directory; inside MODX the path is the `core/cache/` directory.

## Syntax

``` php
string|null getCachePath ()
```

## Example

``` php
echo $xpdo->getCachePath();
```

## See Also

- [xPDOCacheManager.getCachePath](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcachepath "xPDOCacheManager.getCachePath")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")