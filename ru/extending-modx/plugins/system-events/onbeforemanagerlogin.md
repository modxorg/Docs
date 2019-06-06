---
title: "OnBeforeManagerLogin"
translation: "extending-modx/plugins/system-events/onbeforemanagerlogin"
---

## Событие: OnBeforeManagerLogin

Запускается до запуска процесса входа для пользователя при входе в контекст менеджера. Это событие может быть использовано для отказа в процессе входа в систему. По умолчанию это запрещает вход в систему.

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

## Event Login Workflow

1. _[_OnBeforeWebLogin_](extending-modx/plugins/system-events/onbeforeweblogin)_ || **_OnBeforeManagerLogin_** - Внутри этого события разработчик может проверить наличие ошибочных параметров, которые **будут запрещать** дальнейшую регистрацию в процессе. Если плагины, выполненные этим событием, возвращают что-то, кроме true, вход в систему будет прерван с указанной ошибкой.
2. _[OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)_ - Это событие выполняется, только если указанное имя пользователя не найдено в базе данных MODX. Разработчик может предоставить свой собственный объект modUser в выходных данных события, чтобы продолжить процесс входа в систему.
3. _[OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)_ || _[OnManagerAuthentication](hextending-modx/plugins/system-events/onmanagerauthentication)_ - Внутри этого события разработчик может проверить параметры, которые **отменят проверку по умолчанию паролем** и **позволят** продолжить вход в систему. Если один из плагинов, выполненных из этого события, возвращает true, пользователь считается проверенным и вошел в систему.
4. _[OnWebLogin](extending-modx/plugins/system-events/onweblogin)_ || _[OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)_ - Это событие вызывается после завершения процесса входа в систему и считается, что пользователь вошел в систему. Оно **не меняет **процесс входа в систему **поведение**.

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
