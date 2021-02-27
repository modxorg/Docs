---
title: "OnSiteRefresh"
translation: "extending-modx/plugins/system-events/onsiterefresh"
---

## Событие: OnSiteRefresh

Запускается после очиски кеша для всего сайта.

Служба: 1 - Parser Service Events
Группа: Нет

## Параметры события

| Имя     | Описание            |
| ------- | ------------------- |
| results | Массив результатов. |

## Пример

Такой плагин выведет в консоли массив того, что было очищено:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnSiteRefresh':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Кэш очищен '.print_r($partitions));
        break;
}
```  

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
