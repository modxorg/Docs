---
title: "modX.getAuthenticatedUser"
translation: "extending-modx/modx-class/reference/modx.getauthenticateduser"
---

## modX::getAuthenticatedUser

Возвращает пользователя, прошедшего аутентификацию в указанном контексте.

## Синтаксис

API Doc: [modX::getAuthenticatedUser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getAuthenticatedUser())

``` php
unknown getAuthenticatedUser ([string $contextKey = ''])
```

## Пример

Получить аутентифицированного пользователя для контекста "sports" :

``` php
$user = $modx->getAuthenticatedUser('sports');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modx.getUser](extending-modx/modx-class/reference/modx.getuser)
