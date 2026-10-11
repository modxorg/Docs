---
title: "modUser.removeSessionCookie"
translation: "extending-modx/core-model/moduser/moduser.removesessioncookie"
description: "Удалить cookie сеанса пользователя для контекста"
---

## modUser::removeSessionCookie

Удаляет cookie сеанса для пользователя.

Тело метода в ядре пустое (`TODO Implement this.` в `core/src/Revolution/modUser.php`), поэтому вызов сейчас ничего не делает: cookie остаётся на месте, а `$context` не используется. Сеанс фактически завершает `endSession()`.

## Синтаксис

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
