---
title: "xPDOCacheManager.add"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.add"
---

## xPDOCacheManager::add

Добавляет значение в кеш, только если по этому ключу ещё нет записи. Используйте это вместо [set()](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set "xPDOCacheManager.set"), когда нужно избежать перезаписи существующей записи.

> [!NOTE]
> Параметр `$var` передаётся по ссылке.

## Синтаксис

``` php
boolean add (string $key, mixed &$var, [integer $lifetime = 0], [array $options = array()])
```

## Пример

``` php
$value = 'first write';
$cacheManager->add('mykey', $value);
```

## Смотрите также

-   [set](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.set "set")
-   [replace](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.replace "replace")
-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")