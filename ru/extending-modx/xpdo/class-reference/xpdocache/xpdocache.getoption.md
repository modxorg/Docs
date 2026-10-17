---
title: "xPDOCache.getOption"
translation: "extending-modx/xpdo/class-reference/xpdocache/xpdocache.getoption"
---

## xPDOCache::getOption

Возвращает значение опции для кеш-провайдера, при необходимости возвращая значение по умолчанию. Опции провайдера включают `cache_ext` и `removeIfEmpty` для файловых провайдеров.

## Синтаксис

```php
mixed getOption (string $key, [array $options = array()], [mixed $default = null])
```

## Пример

```php
$ext = $provider->getOption('cache_ext', $options, '.cache.php');
```

## Смотрите также

-   [xPDOCache](extending-modx/xpdo/class-reference/xpdocache "xPDOCache")