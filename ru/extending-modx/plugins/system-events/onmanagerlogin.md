---
title: "OnManagerLogin"
translation: "extending-modx/plugins/system-events/onmanagerlogin"
---

## Событие: OnManagerLogin

Fires anytime a user successfully logs into the manager after performing any autentification checks successfully. Doesn't affect the autentification process.

Служба: 2 - Manager Access Service Events
Группа: Нет

## Параметры события

| Имя        | Описание                                                                                     |
| ---------- | -------------------------------------------------------------------------------------------- |
| user       | Ссылка на объект modUser.                                                                    |
| attributes | Массив: - rememberme - Булево множество, если пользователь хочет, чтобы пароль был запомнен. |
|            | - lifetime - Время жизни файла cookie сеанса для этого логина.                               |
|            | - loginContext - Ключ контекста, в котором происходит вход в систему.                        |
|            | - addContexts - Дополнительные контексты, в которых вход в систему также происходит.         |

## Event Login Workflow

1. _[_OnBeforeWebLogin_](http://rtfm.modx.com/display/revolution20/OnBeforeWebLogin)_ || _[OnBeforeManagerLogin](http://rtfm.modx.com/display/revolution20/OnBeforeManagerLogin)_ - Внутри этого события разработчик может проверить наличие ошибочных параметров, которые **будут запрещать** дальнейшую регистрацию в процессе. Если плагины, выполненные этим событием, возвращают что-то, кроме true, вход в систему будет прерван с указанной ошибкой.
2. _[OnUserNotFound](http://rtfm.modx.com/display/revolution20/OnUserNotFound)_ - Это событие выполняется, только если указанное имя пользователя не найдено в базе данных MODX. Разработчик может предоставить свой собственный объект modUser в выходных данных события, чтобы продолжить процесс входа в систему.
3. _[OnWebAuthentication](http://rtfm.modx.com/display/revolution20/OnWebAuthentication)_ || _[OnManagerAuthentication](http://rtfm.modx.com/display/revolution20/OnManagerAuthentication)_ - Внутри этого события разработчик может проверить параметры, которые **отменят проверку по умолчанию паролем** и **позволят** продолжить вход в систему. Если один из плагинов, выполненных из этого события, возвращает true, пользователь считается проверенным и вошел в систему.
4. _[OnWebLogin](http://rtfm.modx.com/display/revolution20/OnWebLogin)_ || **_OnManagerLogin_** - Это событие вызывается после завершения процесса входа в систему и считается, что пользователь вошел в систему. Оно **не меняет **процесс входа в систему **поведение**.

## Смотри также

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
