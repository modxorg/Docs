---
title: "OnBeforeCacheUpdate"
translation: "extending-modx/plugins/system-events/onbeforecacheupdate"
description: "Событие запускается перед очисткой кэша сайта."
---

## Событие: OnBeforeCacheUpdate

Событие запускается перед очисткой всего кэша сайта.

- Служба: 4 - Cache Service Events
- Group: System

## Параметры события

Нет.

## Пример

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

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
