---
title: "xPDOCacheManager.clean"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.clean"
---

## xPDOCacheManager::clean

Очищает провайдеры кеша, удаляя просроченные записи, а в зависимости от опций — ещё и пустые файлы. Возвращает количество очищенных записей.

## Синтаксис

``` php
integer clean ([array $options = array()])
```

## Пример

``` php
$cacheManager->clean();
```

## Смотрите также

-   [refresh](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.refresh "refresh")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")