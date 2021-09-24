---
title: "OnBeforeManagerLogin"
translation: "extending-modx/plugins/system-events/onbeforemanagerlogin"
---

## Событие: OnBeforeManagerLogin

Запускается перед тем, как процесс входа в систему запускается для пользователя, при входе в админ панель. Можно использовать для запрета на вход.

Чтобы разрешить вход при использовании этого события, пожалуйста, используйте:

``` php
$modx->event->output(true);
// before Revo 2.3.0 you should use instead:
$modx->event->_output = true;
```

Служба: 2 - Manager Access Events
Группа: Нет

## Параметры события

| Имя        | Описание                                                                                                          |
| ---------- | ----------------------------------------------------------------------------------------------------------------- |
| username   | Предоставленное имя пользователя.                                                                                 |
| password   | Предоставленный пароль.                                                                                           |
| attributes | Массив:                                                                                                           |
|            | - **&** rememberme - Булево множество, если пользователь хочет, чтобы пароль был запомнен. **Передано по ссылке** |
|            | - **&** lifetime - Время жизни файла cookie сеанса для этого логина. **Передано по ссылке**                       |
|            | - **&** loginContext - Ключ контекста, в котором происходит вход в систему. **Передано по ссылке**                |
|            | - **&** addContexts - Дополнительные контексты, в которых вход в систему также происходит. **Передано по ссылке** |

## Рабочий процесс входа в систему

1. _[_OnBeforeWebLogin_](extending-modx/plugins/system-events/onbeforeweblogin)_ || **_OnBeforeManagerLogin_** - Внутри этого события разработчик может проверить наличие ошибочных параметров, которые **будут запрещать** дальнейшую регистрацию в процессе. Если плагины, выполненные этим событием, возвращают что-то, кроме true, вход в систему будет прерван с указанной ошибкой.
2. _[OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)_ - Это событие выполняется, только если указанное имя пользователя не найдено в базе данных MODX. Разработчик может предоставить свой собственный объект modUser в выходных данных события, чтобы продолжить процесс входа в систему.
3. _[OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)_ || _[OnManagerAuthentication](hextending-modx/plugins/system-events/onmanagerauthentication)_ - Внутри этого события разработчик может проверить параметры, которые **отменят проверку по умолчанию паролем** и **позволят** продолжить вход в систему. Если один из плагинов, выполненных из этого события, возвращает true, пользователь считается проверенным и вошел в систему.
4. _[OnWebLogin](extending-modx/plugins/system-events/onweblogin)_ || _[OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)_ - Это событие вызывается после завершения процесса входа в систему и считается, что пользователь вошел в систему. Оно **не меняет **процесс входа в систему **поведение**.

## Примеры

Такой плагин выведет в "Журнал ошибок" кто, с каким паролем, и куда пытался войти:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogin':
        $modx->log(modX::LOG_LEVEL_ERROR, 'Пытался войти пользователь с именем '.$username.' и паролем '.$password.print_r($attributes));
        break;
}
```
                
Такой сделает пользователя неактивным, когда он будет пытатся авторизоваться:

``` php
<?php
$eventName = $modx->event->name;
switch($eventName) {
    case 'OnBeforeManagerLogin':
        if ($username == 'manager'){
            $user = $modx->getObject('modUser', array('username' => $username));
            $user->set('active', '0');
            $user->save();
        }
        break;
}
``` 

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
