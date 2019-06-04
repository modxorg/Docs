---
title: "modUser.addSessionContext"
translation: "extending-modx/core-model/moduser/moduser.addsessioncontext"
---

## modUser::addSessionContext

Добавляет новый контекст в массив контекста сеанса пользователя.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::addSessionContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::addSessionContext())

``` php
void addSessionContext (string $context)
```

## Пример

Добавьте 'sports' контекст сессию для пользователя.

``` php
$modx->addSessionContext('sports');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
