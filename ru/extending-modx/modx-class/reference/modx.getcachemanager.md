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
object getCacheManager([string $class = ''], [[array $options = array('path' => XPDO_CORE_PATH, 'ignorePkg' => true)]])
```

- `$class` _(string)_ Имя класса кеш-менеджера для загрузки 
- `$options` _(array)_ Массив параметров для отправки экземпляру диспетчера кеша 

## Пример

Получение Cache Manager, чтобы установить фиктивный файл кэша.

``` php
$cacheManager = $modx->getCacheManager();
$cacheManager->set('testcachefile','test123');
```

## Смотрите также

- [Кеширование](extending-modx/xpdo/caching "Кеширование") – подробные варианты описаны на странице кэширования xPDO. 
- [modX](extending-modx/core-model/modx "modX")
