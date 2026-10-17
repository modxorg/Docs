---
title: "xPDOCacheManager.getFolderPermissions"
_old_id: "1912"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.getfolderpermissions"
---

## xPDOCacheManager::getFolderPermissions

Returns the permissions used for newly created folders. The value is derived from the process umask (`0777 & (0777 - umask)`), not a hard-coded constant.

## Syntax

``` php
integer getFolderPermissions ()
```

## Example

``` php
$perms = $cacheManager->getFolderPermissions();
```

## See Also

- [getFilePermissions](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getfilepermissions "getFilePermissions")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")