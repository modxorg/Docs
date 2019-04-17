---
title: "modUser.getSessionContexts"
translation: "extending-modx/core-model/moduser/moduser.getsessioncontexts"
---

## modUser::getSessionContexts

Возвращает массив ключей контекста сеанса пользователя.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::getSessionContexts()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::getSessionContexts())

``` php
array getSessionContexts ()
```

## Пример

Получить все сессии контекста пользователя, вошедшего в web и mgr контексты:

``` php
$keys = $user->getSessionContexts();
print_r($keys); // prints Array ( 'web', 'mgr' );
```

## Смотрите также

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
