---
title: "OnBeforeSaveWebPageCache"
translation: "extending-modx/plugins/system-events/onbeforesavewebpagecache"
---

## Событие: OnBeforeSaveWebPageCache

Запускается после того как ресурс загружен но еще не закэшировался. Если ресурс не кэшируемый, то это событие не сработает.

Служба: 4 - Cache Service Events
Группа: Нет

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

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
