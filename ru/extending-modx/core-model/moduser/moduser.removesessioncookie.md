---
title: "modUser.removeSessionCookie"
translation: "extending-modx/core-model/moduser/moduser.removesessioncookie"
---

## modUser::removeSessionCookie

Удаляет cookie сеанса для пользователя.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::removeSessionCookie()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::removeSessionCookie())

``` php
void removeSessionCookie (string $context)
```

## Пример

Удалите файл cookie сеанса для пользователя в контексте 'sports'.

``` php
$user->removeSessionCookie('sports');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
