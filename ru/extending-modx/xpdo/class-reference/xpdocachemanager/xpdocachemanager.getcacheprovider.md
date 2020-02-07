---
title: "xPDOCacheManager.getCacheProvider"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcacheprovider"
---

## xPDOCacheManager::getCacheProvider

Получает экземпляр поставщика, который реализует интерфейс `xPDOCache`. По умолчанию используется `xPDOFileCache`.

## Синтаксис

API Docs: <http://api.modxcms.com/xpdo/cache/xPDOCacheManager.html#getCacheProvider>

```php
void &getCacheProvider ([ $key = ''], [ $options = array()])
```

## Пример

```php
$cacheManager = $xpdo->getCacheManager();
$provider = $cacheManager->getCacheProvider('xPDOMemCache');
```

## Смотрите также

-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
