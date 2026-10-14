---
title: "OnCacheUpdate"
translation: "extending-modx/plugins/system-events/oncacheupdate"
description: "Событие запускается после очистки кэша сайта."
---

## Событие: OnCacheUpdate

Событие запускается после очистки кэша сайта, в `modCacheManager::clean()` и `modCacheManager::refresh()`.

- Служба: 4 - Cache Service Events
- Group: System

## Параметры события

| Имя     | Описание                                        |
| ------- | ----------------------------------------------- |
| results | Результаты очистки.                             |
| paths   | Массив путей, которые должны были быть очищены. |
| options | Массив опций передается в метод очистки кэша.   |

## Пример

Такой плагин выведет на экран и запишет в "Журнал ошибок" результат выполнения:

```php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnCacheUpdate':
        $modx->log(modX::LOG_LEVEL_ERROR, print_r($results, true));
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
