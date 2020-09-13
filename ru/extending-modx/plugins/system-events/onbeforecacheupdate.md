---
title: "OnBeforeCacheUpdate"
translation: "extending-modx/plugins/system-events/onbeforecacheupdate"
---

## Событие: OnBeforeCacheUpdate

Запускается перед обновлением кэша.

Сервис: 4 - События сервиса кэша
Группа: Нет

## Параметры события

Нет.

## Example

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeCacheUpdate':
        $modx->log(modX::LOG_LEVEL_ERROR, "Стартуем!");
        break;
}
```

Теперь обновите кэш, и увидите "Стартуем!"

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
