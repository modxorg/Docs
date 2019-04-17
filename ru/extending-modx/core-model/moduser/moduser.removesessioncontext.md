---
title: "modUser.removeSessionContext"
translation: "extending-modx/core-model/moduser/moduser.removesessioncontext"
---

## modUser::removeSessionContext

Удаляет контекст сеанса пользователя.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::removeSessionContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::removeSessionContext())

``` php
void removeSessionContext (string|array $context)
```

## Пример

Удалите сеанс для пользователя в контексте 'sports'.

``` php
$user->removeSessionContext('sports');
```

## Смотрите также

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
