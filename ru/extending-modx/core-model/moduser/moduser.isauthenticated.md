---
title: "modUser.isAuthenticated"
translation: "extending-modx/core-model/moduser/moduser.isauthenticated"
---

## modUser::isAuthenticated

Определяет, аутентифицирован ли этот пользователь в определенном контексте.

Отдельные контексты сеанса могут позволить пользователям входить/выходить из определенных дочерних сайтов индивидуально (или в коллекциях).

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::isAuthenticated()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::isAuthenticated())

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
