---
title: "xPDOCacheManager.unlockFile"
_old_id: "1915"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.unlockfile"
---

## xPDOCacheManager::unlockFile

Unlocks a cache file previously locked with [lockFile()](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.lockfile "xPDOCacheManager.lockFile").

## Syntax

``` php
boolean unlockFile (string $file, [array $options = array()])
```

## Example

``` php
$cacheManager->unlockFile($path);
```

## See Also

- [lockFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.lockfile "lockFile")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")