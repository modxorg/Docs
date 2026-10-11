---
title: "modUser.isAuthenticated"
translation: "extending-modx/core-model/moduser/moduser.isauthenticated"
description: "Проверить, аутентифицирован ли пользователь в контексте"
---

## modUser::isAuthenticated

Определяет, аутентифицирован ли этот пользователь в определенном контексте.

Отдельные контексты сеанса могут позволить пользователям входить/выходить из определенных дочерних сайтов индивидуально (или в коллекциях).

## Синтаксис

``` php
boolean isAuthenticated ([string $sessionContext = 'web'])
```

## Пример

Посмотрите, вошел ли пользователь в 'web' контекст. Если нет, запретите доступ и отправьте на Неавторизованную страницу.

``` php
if (!$modx->user->isAuthenticated('web')) {
   $modx->sendUnauthorizedPage();
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [Users](building-sites/client-proofing/security/users)
