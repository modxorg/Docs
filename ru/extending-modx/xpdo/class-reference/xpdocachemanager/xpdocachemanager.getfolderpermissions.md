---
title: "xPDOCacheManager.getFolderPermissions"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getfolderpermissions"
---

## xPDOCacheManager::getFolderPermissions

Возвращает права, используемые для вновь создаваемых папок. Значение вычисляется из umask процесса (`0777 & (0777 - umask)`), а не берётся из жёстко зашитой константы.

## Синтаксис

``` php
integer getFolderPermissions ()
```

## Пример

``` php
$perms = $cacheManager->getFolderPermissions();
```

## Смотрите также

-   [getFilePermissions](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getfilepermissions "getFilePermissions")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")