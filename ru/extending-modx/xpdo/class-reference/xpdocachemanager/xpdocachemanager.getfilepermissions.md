---
title: "xPDOCacheManager.getFilePermissions"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getfilepermissions"
---

## xPDOCacheManager::getFilePermissions

Возвращает права, используемые для вновь записанных файлов. Значение вычисляется на основе umask процесса (`0666 & (0666 - umask)`), а не берётся из жёстко заданной константы.

## Синтаксис

```php
integer getFilePermissions ()
```

## Пример

```php
$perms = $cacheManager->getFilePermissions();
```

## Смотрите также

-   [getFolderPermissions](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getfolderpermissions "getFolderPermissions")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")