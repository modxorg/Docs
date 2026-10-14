---
title: "OnBeforeSaveWebPageCache"
translation: "extending-modx/plugins/system-events/onbeforesavewebpagecache"
description: "Событие запускается перед записью страницы кэшируемого ресурса в кэш."
---

## Событие: OnBeforeSaveWebPageCache

Событие запускается после того, как ресурс загружен, но ещё не закэширован. Оно срабатывает только при успешной генерации страницы, а также требует системной настройки `cache_resource` (по умолчанию `1`) и `cacheable = 1` у ресурса. Иначе в кэш ничего не записывается и событие не запускается.

- Служба: 4 - Cache Service Events
- Group: System

## Параметры события

Нет. На ресурс можно ссылаться через `$modx->resource`.

## Пример

Такой плагин запишет в "Журнал ошибок" id загруженного ресурса:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeSaveWebPageCache':
        $res = $modx->resource->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Ресурс с id '.$res.' успешно загрузился');
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
