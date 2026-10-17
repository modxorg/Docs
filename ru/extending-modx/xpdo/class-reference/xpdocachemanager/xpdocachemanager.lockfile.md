---
title: "xPDOCacheManager.lockFile"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.lockfile"
---

## xPDOCacheManager::lockFile

Блокирует файл кеша на запись, чтобы параллельные запросы не перезаписали его друг друга. Блокировка используется кеш-провайдерами для атомарности записи.

## Синтаксис

```php
boolean lockFile (string $file, [array $options = array()])
```

## Пример

```php
if ($cacheManager->lockFile($path)) {
    // write to the file
    $cacheManager->unlockFile($path);
}
```

## Смотрите также

-   [unlockFile](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.unlockfile "unlockFile")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")