---
title: "xPDOCacheManager.refresh"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.refresh"
---

## xPDOCacheManager::refresh

Обновляет кеш, пересобирая каждого провайдера. В чистом xPDO это очищает провайдеры кеша; внутри MODX метод переопределён в `modCacheManager`, который также пересобирает карту разбиений и вызывает событие `OnCacheUpdate`.

## Синтаксис

```php
array refresh ([array $providers = array()], [array &$results = array()])
```

## Пример

```php
$results = $cacheManager->refresh();
```

## Смотрите также

-   [clean](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.clean "clean")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")