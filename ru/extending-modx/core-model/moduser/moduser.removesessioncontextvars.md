---
title: "modUser.removeSessionContextVars"
translation: "extending-modx/core-model/moduser/moduser.removesessioncontextvars"
---

## modUser::removeSessionContextVars

Удаляет переменные сеанса, связанные с конкретным контекстом.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::removeSessionContextVars()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::removeSessionContextVars())

``` php
void removeSessionContextVars (string $context)
```

## Пример

Удалите все переменные сеанса для пользователя в контексте 'sports'.

``` php
$user->removeSessionContextVars('sports');
```

## Смотрите также

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
