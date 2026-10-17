---
title: "xPDO.getCachePath"
description: "Возвращает путь, по которому xPDO записывает файлы кеша."
translation: "extending-modx/xpdo/class-reference/xpdo/xpdo.getcachepath"
---

## xPDO::getCachePath

Возвращает абсолютный путь к каталогу, в который xPDO записывает файлы кеша. Если `xPDO::OPT_CACHE_PATH` не задан, xPDO пишет в каталог `.xpdo-cache` внутри системного временного каталога; внутри MODX это каталог `core/cache/`.

## Синтаксис

```php
string|null getCachePath ()
```

## Пример

```php
echo $xpdo->getCachePath();
```

## Смотрите также

-   [xPDOCacheManager.getCachePath](extending-modx/xpdo/class-reference/xpdocachemanager/xpdocachemanager.getcachepath "xPDOCacheManager.getCachePath")
-   [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")