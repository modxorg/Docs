---
title: "xPDOCache.getCacheKey"
translation: "extending-modx/xpdo/class-reference/xpdocache/xpdocache.getcachekey"
---

## xPDOCache::getCacheKey

Строит физический ключ кеша для логического ключа, объединяя раздел кеша (`xPDO::OPT_CACHE_KEY`) и префикс кеша (`xPDO::OPT_CACHE_PREFIX`) с самим ключом. Именно так записи разделяются по пространствам имён внутри провайдера.

## Синтаксис

``` php
string getCacheKey (string $key, [array $options = array()])
```

## Пример

``` php
$cacheKey = $provider->getCacheKey('mykey');
```

## Смотрите также

-   [xPDOCache](extending-modx/xpdo/class-reference/xpdocache "xPDOCache")