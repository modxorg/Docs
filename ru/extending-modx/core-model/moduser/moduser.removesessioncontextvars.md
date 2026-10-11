---
title: "modUser.removeSessionContextVars"
translation: "extending-modx/core-model/moduser/moduser.removesessioncontextvars"
description: "Удалить переменные сеанса, связанные с контекстом"
---

## modUser::removeSessionContextVars

Удаляет переменные сеанса, связанные с конкретным контекстом.

## Синтаксис

``` php
void removeSessionContextVars (string $context)
```

## Пример

Удалите все переменные сеанса для пользователя в контексте 'sports'.

``` php
$user->removeSessionContextVars('sports');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser "modUser")
- [Contexts](building-sites/contexts "Contexts")
