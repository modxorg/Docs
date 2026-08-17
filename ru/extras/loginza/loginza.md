---
title: "Loginza"
description: "Сниппет Loginza: вход, выход и регистрация пользователей"
translation: "extras/loginza/loginza"
---

## Описание

Сниппет для входа и выхода пользователей.

При первом входе пользователь регистрируется. При следующих входах профиль обновляется по умолчанию.

## Использование

Вызовите некешированный сниппет на странице.

``` php
[[!Loginza]]
```

Регистрация в группу Users, без обновления профиля при следующих входах и с запоминанием:

``` php
[[!Loginza?
  &groups=`Users`
  &updateProfile=`0`
  &rememberme=`1`
]]
```

## Доступные свойства

| Имя              | Описание                                                                                                                                            | Значение по умолчанию                                                                                         |
| ---------------- | --------------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------- |
| action           | Действие сниппета (login, logout, getProfile, updateProfile, loadTpl)                                                                               | loadTpl                                                                                                       |
|                  |                                                                                                                                                     |                                                                                                               |
| updateProfile    | Обновлять профиль данными от сервиса авторизации: fullname, email, дата рождения и т. д.                                                            | 1                                                                                                             |
| rememberme       | Запоминать пользователя. Зависит от [session\_cookie\_lifetime](building-sites/settings/session_cookie_lifetime "session_cookie_lifetime")         | 1                                                                                                             |
| groups           | Список существующих групп через запятую для регистрации пользователей                                                                             | нет                                                                                                           |
|                  |                                                                                                                                                     |                                                                                                               |
| loginTpl         | Чанк для неавторизованных пользователей со ссылкой на вход                                                                                          | [tpl.Loginza.login](extras/loginza/tpl.loginza.login "tpl.Loginza.login")                                     |
| logoutTpl        | Чанк для авторизованного пользователя со ссылкой на выход                                                                                           | [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout "tpl.Loginza.logout")                                  |
| profileTpl       | Чанк для просмотра и редактирования профиля                                                                                                         | [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile "tpl.Loginza.profile")                               |
|                  |                                                                                                                                                     |                                                                                                               |
| saltName         | Строка для усложнения md5-хеша имени пользователя md(identity + salt). Без неё имя будет простым md5 от identity внешнего сервиса                   | нет                                                                                                           |
| saltPass         | Строка для усложнения md5-хеша пароля. Без неё пароль будет простым md5 от identity внешнего сервиса                                              | нет                                                                                                           |
|                  |                                                                                                                                                     |                                                                                                               |
| loginContext     | Контекст для входа                                                                                                                                  | текущий контекст                                                                                              |
| addContexts      | Дополнительные контексты для входа через запятую                                                                                                    | нет                                                                                                           |
| profileFields    | Разрешённые поля профиля для обновления через запятую                                                                                               | username,email,fullname,phone,mobilephone,dob,gender,address,country,city,state,zip,fax,photo,comment,website |
| requiredFields   | Обязательные поля при обновлении через запятую                                                                                                      | username,email,fullname                                                                                       |
|                  |                                                                                                                                                     |                                                                                                               |
| loginResourceId  | ID ресурса для редиректа после успешного входа. 0 означает редирект на текущую страницу                                                             | 0                                                                                                             |
| logoutResourceId | ID ресурса для редиректа после успешного выхода. 0 означает редирект на текущую страницу                                                            | 0                                                                                                             |

## Исходный код

[Сниппет на GitHub](https://github.com/bezumkin/modx-loginza/blob/master/core/components/loginza/elements/snippets/loginza.php).

## См. также

1. [Loginza.Loginza](extras/loginza/loginza)
2. [tpl.Loginza.login](extras/loginza/tpl.loginza.login)
3. [tpl.Loginza.logout](extras/loginza/tpl.loginza.logout)
4. [tpl.Loginza.profile](extras/loginza/tpl.loginza.profile)
