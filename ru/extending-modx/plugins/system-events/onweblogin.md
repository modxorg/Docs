---
title: "OnWebLogin"
translation: "extending-modx/plugins/system-events/onweblogin"
---

## Событие: OnWebLogin

Вызывается каждый раз, когда пользователь входит в не-mgr контекст после успешного выполнения любых проверок аутентификации. Не влияет на процесс аутентификации.

Служба: 3 - Web Access Service Events
Группа: Нет

## Параметры события

| Имя          | Описание                                                                                     |
| ------------ | -------------------------------------------------------------------------------------------- |
| user         | Ссылка на объект modUser.                                                                    |
| attributes   | Массив: - rememberme - Булево множество, если пользователь хочет, чтобы пароль был запомнен. |
| lifetime     | The session cookie lifetime for this login.                                                  |
| loginContext | Ключ контекста, в котором происходит вход в систему.                                         |
| addContexts  | Дополнительные контексты, в которых вход в систему также происходит.                         |

## Event Login Workflow

1. _[_OnBeforeWebLogin_](extending-modx/plugins/system-events/onbeforeweblogin)_ || _[OnBeforeManagerLogin](extending-modx/plugins/system-events/onbeforemanagerlogin)_ - Внутри этого события разработчик может проверить наличие ошибочных параметров, которые **будут запрещать** дальнейшую регистрацию в процессе. Если плагины, выполненные этим событием, возвращают что-то, кроме true, вход в систему будет прерван с указанной ошибкой.
2. _[OnUserNotFound](extending-modx/plugins/system-events/onusernotfound)_ - Это событие выполняется, только если указанное имя пользователя не найдено в базе данных MODX. Разработчик может предоставить свой собственный объект modUser в выходных данных события, чтобы продолжить процесс входа в систему.
3. _[OnWebAuthentication](extending-modx/plugins/system-events/onwebauthentication)_ || _[OnManagerAuthentication](hextending-modx/plugins/system-events/onmanagerauthentication)_ - Внутри этого события разработчик может проверить параметры, которые **отменят проверку по умолчанию паролем** и **позволят** продолжить вход в систему. Если один из плагинов, выполненных из этого события, возвращает true, пользователь считается проверенным и вошел в систему.
4. **_OnWebLogin_** || _[OnManagerLogin](extending-modx/plugins/system-events/onmanagerlogin)_ - Это событие вызывается после завершения процесса входа в систему и считается, что пользователь вошел в систему. Оно **не меняет **процесс входа в систему **поведение**.

## Смотри также

- [Системные события](extending-modx/plugins/system-events "Системные события")
- [Плагины](extending-modx/plugins "Плагины")
