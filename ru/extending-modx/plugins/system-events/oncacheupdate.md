---
title: "OnCacheUpdate"
translation: "extending-modx/plugins/system-events/oncacheupdate"
---

## Событие: OnCacheUpdate

Запускается после того, как кэш очищен.

Служба: 4 - Cache Service Events
Группа: Нет

## Параметры события

| Имя     | Описание                                        |
| ------- | ----------------------------------------------- |
| results | Результаты очистки.                             |
| paths   | Массив путей, которые должны были быть очищены. |
| options | Массив опций передается в метод очистки кэша.   |

## Пример

Такой плагин выведет на экран и запишет в "Журнал ошибок" результат выполнения:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnCacheUpdate':
        $modx->log(modX::LOG_LEVEL_ERROR, print_r($results));
        break;
}

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
