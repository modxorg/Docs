---
title: "modX.sendUnauthorizedPage"
description: "Отправьте пользователя на неавторизованную страницу MODX."
translation: "extending-modx/modx-class/reference/modx.sendunauthorizedpage"
---

## modX::sendUnauthorizedPage

Отправьте пользователя на неавторизованную страницу MODX.

## Синтаксис

``` php
void sendUnauthorizedPage ([array $options = null])
```

Перед перенаправлением вызывается событие [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized "OnPageUnauthorized") с `$options`. Затем пользователь отправляется на ресурс, настроенный в параметре [unauthorized_page](building-sites/settings/unauthorized_page), а если тот не задан — на [site_start](building-sites/settings/site_start).

`$options` может переопределить значения по умолчанию, заполняемые из настроек `unauthorized_page_header`, `unauthorized_page_pagetitle` и `unauthorized_page_message`:

- `response_code`, `error_header` — строка заголовка HTTP (по умолчанию `401 Unauthorized`)
- `error_type` — тип ошибки, передаваемый в `sendError`, по умолчанию `401`
- `error_pagetitle` — по умолчанию `Error 401: Unauthorized`
- `error_message` — по умолчанию `<h1>Unauthorized</h1><p>You are not authorized to view the requested content.</p>`
- `unauthorized_page` — идентификатор ресурса неавторизованной страницы только для данного вызова

## Пример

Отправьте пользователя на неавторизованную страницу. Вам не нужно завершать скрипт после запуска этого.

``` php
$modx->sendUnauthorizedPage();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
