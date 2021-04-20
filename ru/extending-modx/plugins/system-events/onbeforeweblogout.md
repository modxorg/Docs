---
title: "OnBeforeWebLogout"
translation: "extending-modx/plugins/system-events/onbeforeweblogout"
---

## Событие: OnBeforeWebLogout

Запускается перед тем как пользователь разлогиниться.

Служба: 3 - Web Access Service Events
Группа: Нет

## Параметры события

| Имя                | Описание                                                                                      |
| ------------------ | --------------------------------------------------------------------------------------------- |
| **&** user         | Ссылка на объект modUser пользователя. **Передано по ссылке**                                 |
| userid             | Идентификатор пользователя. (Устаревшее)                                                      |
| username           | Имя username пользователя. (Устаревшее)                                                       |
| **&** loginContext | Ключ контекста, в котором происходит выход из системы. **Передано по ссылке**                 |
| **&** addContexts  | Дополнительные контексты, в которых также происходит выход из системы. **Передано по ссылке** |

## Пример

Такой плагин запишет в "Журнал ошибок" id вышедшего пользователя и откуда он вышел:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeWebLogout':
        $u = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пользователь с id '.$u.' разлогинился в контексте '.$loginContext.' и еще вот в этих'.print_r($addContexts));
        break;
}
``` 

## Смотри также

- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [OnManagerLogout event](extending-modx/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
