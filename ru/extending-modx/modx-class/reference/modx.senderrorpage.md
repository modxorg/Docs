---
title: "modX.sendErrorPage"
translation: "extending-modx/modx-class/reference/modx.senderrorpage"
---

## modX::sendErrorPage

Отправьте пользователя на виртуальную страницу ошибок MODX.

## Синтаксис

API Doc: [modX::sendErrorPage()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendErrorPage())

``` php
void sendErrorPage ([array $options = null])
```

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
