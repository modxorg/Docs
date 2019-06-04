---
title: "modUser.hasSessionContext"
translation: "extending-modx/core-model/moduser/moduser.hassessioncontext"
---

## modUser::hasSessionContext

Checks if the user has a specific session context, or in other words, is "logged into" a certain context.
Проверяет, есть ли у пользователя определенный контекст сеанса или другими словами, «вошел ли» в определенный контекст.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::hasSessionContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::hasSessionContext())

``` php
boolean hasSessionContext (mixed $context)
```

## Пример

Посмотрите, есть ли у User сессия для 'sports' контекста:

``` php
if ($user->hasSessionContext('sports')) {
    // do code here
}
```

## Смотрите также

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
