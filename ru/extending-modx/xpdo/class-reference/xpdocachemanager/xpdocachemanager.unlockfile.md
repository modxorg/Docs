---
title: "xPDOCacheManager.unlockFile"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.unlockfile"
---

## xPDOCacheManager::unlockFile

Снимает блокировку с файла кеша, ранее заблокированного через [lockFile()](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.lockfile "xPDOCacheManager.lockFile").

## Синтаксис

``` php
boolean unlockFile (string $file, [array $options = array()])
```

## Пример

``` php
$cacheManager->unlockFile($path);
```

## Смотрите также

-   [lockFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.lockfile "lockFile")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")