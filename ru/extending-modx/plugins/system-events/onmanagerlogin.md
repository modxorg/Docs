---
title: "OnManagerLogin"
translation: "extending-modx/plugins/system-events/onmanagerlogin"
description: "Событие запускается после успешного входа пользователя в менеджер."
---

## Событие: OnManagerLogin

Событие запускается каждый раз, когда пользователь успешно входит в менеджер после успешного выполнения всех проверок аутентификации. Событие не влияет на процесс аутентификации.

- Служба: 2 - Manager Access Events
- Group: Security

## Параметры события

| Имя         | Описание                                                                                 |
| ----------- | ---------------------------------------------------------------------------------------- |
| user        | Ссылка на объект `modUser`.                                                              |
| attributes  | Массив:                                                                                   |
|             | - rememberme — хочет ли пользователь запомнить вход                                       |
|             | - lifetime — время жизни cookie сеанса для этого входа                                    |
|             | - loginContext — ключ контекста для этого входа                                           |
|             | - addContexts — дополнительные контексты, в которых тоже открыта сессия                    |

## Рабочий процесс входа в систему

1. _[_OnBeforeWebLogin_](extending-modx/plugins/system-events/onbeforeweblogin)_ || _[OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)_ - Внутри этого события разработчик может проверить наличие ошибочных параметров, которые **запретят** дальнейший процесс входа. Если плагины, выполняемые этим событием, возвращают что-то, кроме `true`, вход в систему будет прерван с указанной ошибкой.
2. _[OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)_ - Это событие выполняется, только если указанное имя пользователя не найдено в базе данных MODX. Разработчик может передать в выводе события собственный объект `modUser`, чтобы продолжить процесс входа в систему.
3. _[OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)_ || _[OnManagerAuthentication](extending-modx/plugins/system-events/onmanagerauthentication)_ - Внутри этого события разработчик может проверить параметры, которые **отменят проверку по умолчанию паролем** и **позволят** продолжить процесс входа. Если один из плагинов, выполняемых этим событием, возвращает `true`, пользователь считается проверенным и вошедшим в систему.
4. _[OnWebLogin](extending-modx/plugins/system-events/onweblogin)_ || **_OnManagerLogin_** - Это событие вызывается после завершения процесса входа в систему; пользователь считается вошедшим в систему. Оно **не меняет поведение** процесса входа.

## Пример

Такой плагин запишет в журнал ошибок, кто и куда вошел в систему:

```php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnManagerLogin':
        $id = $user->get('id');
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пользователь вошел в систему с id '.$id.' '.print_r($attributes, true));
        break;
}
```

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
