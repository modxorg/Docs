---
title: "modX.getCacheManager"
description: "Получите расширенный экземпляр xPDOCacheManager, отвечающий за кэширование MODX."
translation: "extending-modx/modx-class/reference/modx.getcachemanager"
---

## modX::getCacheManager

Получите расширенный экземпляр `xPDOCacheManager`, отвечающий за кэширование MODX.

Переопределение `xPDO::getCacheManager`.

## Синтаксис

``` php
modCacheManager getCacheManager([string $class = 'xPDO\Cache\xPDOCacheManager'], [array $options = array('path' => XPDO_CORE_PATH, 'ignorePkg' => true)])
```

- `$class` _(string)_ В `modX` игнорируется: класс берётся из системной настройки `modCacheManager.class` (по умолчанию `MODX\Revolution\modCacheManager`)
- `$options` _(array)_ В `modX` игнорируется; оба аргумента влияют только на родительский `xPDO::getCacheManager`

Метод возвращает общий экземпляр `modCacheManager`, зарегистрированный для этого объекта `modX`, создавая его при первом обращении.

## Пример

Получение Cache Manager, чтобы установить фиктивный файл кэша.

``` php
$cacheManager = $modx->getCacheManager();
$cacheManager->set('testcachefile','test123');
```

## Смотрите также

- [Кеширование](extending-modx/xpdo/caching "Кеширование") – подробные варианты описаны на странице кэширования xPDO. 
- [modX](extending-modx/core-model/modx "modX")
