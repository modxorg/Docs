---
title: "OnManagerLogout"
translation: "extending-modx/plugins/system-events/onmanagerlogout"
---

## Событие: OnManagerLogout

Запускается каждый раз, когда пользователь выходит из контекста. Сессия при этом удаляется.

Служба: 2 - Manager Access Service Events
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

Такой плагин запишет в "Журнал ошибок" кто и где вышел:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerLogout':
        $id = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Вышел пользователь с id '.$id.' из контекста '.$loginContext.' и еще вот этих '.print_r($addContexts));
        break;
}
```

## Смотри также

- [OnBeforeWebLogout event](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [OnBeforeManagerLogout event](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [OnWebLogout event](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
