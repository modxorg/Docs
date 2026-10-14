---
title: "OnManagerLogout"
translation: "extending-modx/plugins/system-events/onmanagerlogout"
description: "Событие запускается после выхода пользователя из менеджера и удаления его сеанса в контексте."
---

## Событие: OnManagerLogout

Событие запускается после выхода пользователя из менеджера и удаления его сеанса в контексте.

- Служба: 2 - Manager Access Events
- Group: Security

## Параметры события

| Имя                | Описание                                                                                        |
| ------------------ | ----------------------------------------------------------------------------------------------- |
| **&** user         | Ссылка на объект `modUser` пользователя. **Передаётся по ссылке**                               |
| userid             | Идентификатор пользователя.                                                                     |
| username           | Имя пользователя.                                                                               |
| **&** loginContext | Ключ контекста, в котором происходит выход из системы. **Передаётся по ссылке**                 |
| **&** addContexts  | Дополнительные контексты, в которых также происходит выход из системы. **Передаётся по ссылке** |

## `$modx->getUser()` во время OnManagerLogout

Тот же процессор выхода, что и у [OnWebLogout](extending-modx/plugins/system-events/onweblogout): сначала снимаются session contexts, потом вызывается событие, `$modx->user` не сбрасывается. Для вышедшего пользователя берите `$user` из события, а не `$modx->getUser()`. Подробности и обходной путь на той странице.

## Пример

Такой плагин запишет в журнал ошибок, кто и откуда вышел:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerLogout':
        $id = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пользователь вышел с id '.$id.' из контекста '.$loginContext.' и ещё вот этих '.print_r($addContexts, true));
        break;
}
```

## Смотри также

- [Событие OnBeforeWebLogout](extending-modx/plugins/system-events/onbeforeweblogout "OnBeforeWebLogout")
- [Событие OnBeforeManagerLogout](extending-modx/plugins/system-events/onbeforemanagerlogout "OnBeforeManagerLogout")
- [Событие OnWebLogout](extending-modx/plugins/system-events/onweblogout "OnWebLogout")
- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
