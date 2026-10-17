---
title: "xPDOCacheManager.clean"
_old_id: "1918"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.clean"
---

## xPDOCacheManager::clean

Cleans the cache providers by removing expired entries and, depending on options, empty files. Returns the number of cleaned entries.

## Syntax

``` php
integer clean ([array $options = array()])
```

## Example

``` php
$cacheManager->clean();
```

## See Also

- [refresh](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.refresh "refresh")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")