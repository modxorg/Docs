---
title: "xPDO.getCacheManager"
description: "Получает экземпляр менеджера кеша."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcachemanager"
---

## xPDO::getCacheManager

Возвращает экземпляр менеджера кеша, используемый экземпляром xPDO. Класс по умолчанию — `xPDO\Cache\xPDOCacheManager`; внутри MODX он заменяется на `MODX\Revolution\modCacheManager`.

## Синтаксис

``` php
xPDO\Cache\xPDOCacheManager getCacheManager ([string $class = 'xPDO\\Cache\\xPDOCacheManager'], [array $options = array('path' => XPDO_CORE_PATH, 'ignorePkg' => true)])
```

## Пример

``` php
$cacheManager = $xpdo->getCacheManager();
$cacheManager->set('mykey', $value);
```

## Смотрите также

-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")