---
title: "xPDOCacheManager.lockFile"
_old_id: "1914"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.lockfile"
---

## xPDOCacheManager::lockFile

Locks a cache file for writing so that concurrent requests do not overwrite it. Locking is used by the cache providers to make writes atomic.

## Syntax

``` php
boolean lockFile (string $file, [array $options = array()])
```

## Example

``` php
if ($cacheManager->lockFile($path)) {
    // write to the file
    $cacheManager->unlockFile($path);
}
```

## See Also

- [unlockFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.unlockfile "unlockFile")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")