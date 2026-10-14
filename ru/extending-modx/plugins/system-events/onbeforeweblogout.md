---
title: "OnBeforeWebLogout"
translation: "extending-modx/plugins/system-events/onbeforeweblogout"
description: "Событие запускается непосредственно перед выходом пользователя из не-mgr контекста."
---

## Событие: OnBeforeWebLogout

Событие запускается непосредственно перед тем, как пользователь выйдет из не-mgr контекста. Выход ещё не произошёл.

- Служба: 3 - Web Access Service Events
- Group: Security

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
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пользователь с id '.$u.' разлогинился в контексте '.$loginContext.' и еще вот в этих'.print_r($addContexts, true));
        break;
}
``` 

## Смотри также

- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [OnManagerLogout event](extending-modx/plugins/system-events/onmanagerlogout "OnManagerLogout")
- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
