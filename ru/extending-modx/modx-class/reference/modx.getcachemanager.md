---
title: "modX.getCacheManager"
translation: "extending-modx/modx-class/reference/modx.getcachemanager"
---

## modX::getCacheManager

Получите расширенный экземпляр `xPDOCacheManager`, отвечающий за кэширование MODX.

Переопределение `xPDO::getCacheManager`.

## Синтаксис

API Doc: [modX::getCacheManager()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getCacheManager())

``` php
object getCacheManager()
```

## Пример

Получение Cache Manager, чтобы установить фиктивный файл кэша.

``` php
$cacheManager = $modx->getCacheManager();
$cacheManager->set('testcachefile','test123');
```

## Смотрите также

- [Caching](extending-modx/xpdo/caching "Caching") – the full options are documented on the xPDO caching page.
- [modX](extending-modx/core-model/modx "modX")
