---
title: "login"
description: "Контроллер входа в форум Discuss и интеграция с SSO через Login"
translation: "extras/discuss/discuss.controllers/login"
---

Контроллер Login показывает форму входа или, если включён discuss.sso_mode (рекомендуется), перенаправляет пользователя на страницу входа.

## Основная информация

| Since Version         | 1.0                              |
| --------------------- | -------------------------------- |
| Controller File       | controllers/web/login.class.php  |
| Controller Class Name | DiscussLoginController           |
| Controller Template   | pages/login.tpl (if sso_mode=0) |
| Manifest Name         | login                            |

## Опции

У контроллера Login нет опций manifest.

Поведение контроллера Login зависит от двух системных настроек. Если задан **discuss.login_resource_id** и включён discuss.sso_mode, контроллер Login перенаправляет запросы на ресурс из login_resource_id с query string &discuss=1.

Если sso_mode выключен или login_resource_id не задан, контроллер Login использует шаблон pages/login.tpl и показывает форму входа.

## Шаблон контроллера

В шаблоне этого контроллера нет специфичных плейсхолдеров.

``` php
[[!Login?
    &loginTpl=`disLoginTpl`
    &logoutTpl=`disLogoutTpl`
    &preHooks=`preHook.DiscussLogin`
    &postHooks=`postHook.DiscussLogin`
]]
```

Обратите внимание: чанки disLoginTpl и disLogoutTpl на момент 1.1.0 не входят в пакет, но могут быть любым валидным [Login chunk](extras/login/login.login "Login.Login"). Чтобы корректно синхронизировать данные пользователя с Discuss, нужны preHook.DiscussLogin как prehook и postHook.DiscussLogin как posthook, в том числе при сторонней схеме авторизации.

[Следуйте этим инструкциям, чтобы настроить вход на сайте с sso_mode (рекомендуется).](extras/discuss/discuss.installation)

## Системные события

На этом контроллере не срабатывают пользовательские системные события.
