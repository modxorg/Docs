---
title: "modX.sendUnauthorizedPage"
translation: "extending-modx/modx-class/reference/modx.sendunauthorizedpage"
---

## modX::sendUnauthorizedPage

Отправьте пользователя на неавторизованную страницу MODX.

## Синтаксис

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::sendUnauthorizedPage()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendUnauthorizedPage())

``` php
void sendUnauthorizedPage ([array $options = null])
```

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
