---
title: "OnSiteRefresh"
translation: "extending-modx/plugins/system-events/onsiterefresh"
description: "Срабатывает после очистки кеша всего сайта."
---

## Событие: OnSiteRefresh

Срабатывает после очистки кеша всего сайта.

- Служба: 1 - Parser Service Events
- Group: System

## Параметры события

| Имя        | Описание                                                                                                              |
| ---------- | --------------------------------------------------------------------------------------------------------------------- |
| results    | Массив результатов обновления кеша.                                                                                   |
| partitions | Массив обновлённых разбиений кеша. Передаётся только когда событие вызывается из процессора очистки кеша; при вызове из контроллера `system/refresh_site` у события **нет параметров**. |

## Пример

Такой плагин выведет в консоли массив того, что было очищено:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnSiteRefresh':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Кэш очищен '.print_r($partitions, true));
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
