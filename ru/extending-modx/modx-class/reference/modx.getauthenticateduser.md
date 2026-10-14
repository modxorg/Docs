---
title: "modX.getAuthenticatedUser"
description: "Возвращает пользователя, прошедшего аутентификацию в указанном контексте."
translation: "extending-modx/modx-class/reference/modx.getauthenticateduser"
---

## modX::getAuthenticatedUser

Возвращает пользователя, прошедшего аутентификацию в указанном контексте.

## Синтаксис

``` php
modUser|null getAuthenticatedUser ([string $contextKey = ''])
```

Возвращает объект `modUser`, аутентифицированный в указанном контексте, или `null`, если там никто не вошёл. Без аргумента используется текущий контекст.

## Пример

Получить аутентифицированного пользователя для контекста "sports" :

``` php
$user = $modx->getAuthenticatedUser('sports');
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modx.getUser](extending-modx/modx-class/reference/modx.getuser)
