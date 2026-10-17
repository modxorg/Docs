---
title: "xPDOCacheManager.getFilePermissions"
_old_id: "1913"
_old_uri: "2.x/class-reference/xpdocachemanager/xpdocachemanager.getfilepermissions"
---

## xPDOCacheManager::getFilePermissions

Returns the permissions used for newly written files. The value is derived from the process umask (`0666 & (0666 - umask)`), not a hard-coded constant.

## Syntax

``` php
integer getFilePermissions ()
```

## Example

``` php
$perms = $cacheManager->getFilePermissions();
```

## See Also

- [getFolderPermissions](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getfolderpermissions "getFolderPermissions")
- [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")