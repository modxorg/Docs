---
title: "modX.sendErrorPage"
description: "Отправьте пользователя на виртуальную страницу ошибок MODX."
translation: "extending-modx/modx-class/reference/modx.senderrorpage"
---

## modX::sendErrorPage

Отправьте пользователя на виртуальную страницу ошибок MODX.

## Синтаксис

``` php
void sendErrorPage ([array $options = null])
```

Перед перенаправлением вызывается событие [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound "OnPageNotFound") с `$options`. Затем пользователь отправляется на ресурс, настроенный в параметре [error_page](building-sites/settings/error_page), а если тот не задан — на [site_start](building-sites/settings/site_start).

`$options` может переопределить значения по умолчанию, заполняемые из настроек `error_page_header`, `error_page_pagetitle` и `error_page_message`:

- `response_code`, `error_header` — строка заголовка HTTP (по умолчанию `404 Not Found`)
- `error_type` — тип ошибки, передаваемый в `sendError`, по умолчанию `404`
- `error_pagetitle` — по умолчанию `Error 404: Page not found`
- `error_message` — по умолчанию `<h1>Page not found</h1><p>The page you requested was not found.</p>`
- `error_page` — идентификатор ресурса страницы ошибки только для данного вызова

## Пример

Отправьте пользователя на страницу ошибок по умолчанию для сайта.

``` php
$modx->sendErrorPage();
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage "modX.sendUnauthorizedPage")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
