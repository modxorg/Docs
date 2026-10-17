---
title: "xPDOCacheManager.getOption"
translation: "extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getoption"
---

## xPDOCacheManager::getOption

Получает значение опции из настроек менеджера кеша, при отсутствии возвращая значение по умолчанию. Опции кеша обычно передаются при каждом вызове, а не задаются в самом менеджере.

## Синтаксис

``` php
mixed getOption (string $key, [array $options = array()], [mixed $default = null])
```

## Пример

``` php
$path = $cacheManager->getOption(xPDO::OPT_CACHE_PATH, $options, MODX_CORE_PATH . 'cache/');
```

## Смотрите также

-   [xPDOCacheManager](extending-modx/xpdo/class-reference/xpdocachemanager "xPDOCacheManager")