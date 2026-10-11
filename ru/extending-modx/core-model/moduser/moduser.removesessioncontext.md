---
title: "modUser.removeSessionContext"
translation: "extending-modx/core-model/moduser/moduser.removesessioncontext"
description: "Удалить контекст из сеанса пользователя"
---

## modUser::removeSessionContext

Удаляет контекст сеанса пользователя.

## Синтаксис

``` php
void removeSessionContext (string|array $context)
```

## Пример

Удалите сеанс для пользователя в контексте 'sports'.

``` php
$user->removeSessionContext('sports');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
