---
title: "modUser.hasSessionContext"
translation: "extending-modx/core-model/moduser/moduser.hassessioncontext"
description: "Проверить, вошёл ли пользователь в контекст"
---

## modUser::hasSessionContext

Проверяет, есть ли у пользователя определенный контекст сеанса или другими словами, «вошел ли» в определенный контекст.

## Синтаксис

``` php
boolean hasSessionContext (mixed $context)
```

## Пример

Проверьте, вошёл ли пользователь в контекст 'sports':

``` php
if ($user->hasSessionContext('sports')) {
    // пользователь вошёл в контекст 'sports'
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
