---
title: "modUser.addSessionContext"
translation: "extending-modx/core-model/moduser/moduser.addsessioncontext"
description: "Добавить контекст в сеанс пользователя"
---

## modUser::addSessionContext

Добавляет новый контекст в массив контекста сеанса пользователя.

## Синтаксис

``` php
void addSessionContext (string $context)
```

## Пример

Добавьте 'sports' контекст сессию для пользователя.

``` php
$modx->user->addSessionContext('sports');
```

`addSessionContext` — метод `modUser`, поэтому вызывайте его на объекте пользователя, а не на `$modx`.

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
