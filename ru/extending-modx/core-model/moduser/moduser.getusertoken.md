---
title: "modUser.getUserToken"
translation: "extending-modx/core-model/moduser/moduser.getusertoken"
description: "Прочитать auth-токен Context из сеанса"
---

## modUser::getUserToken

Возвращает токен, который `addSessionContext()` положил в сеанс под ключом `modx.{context}.user.token` при входе пользователя в Context. Пустой `$ctx` означает текущий Context.

Значения нет — вернётся пустая строка: пользователь в Context не входил либо запись стёрла `removeSessionContextVars()`.

## Синтаксис

``` php
string getUserToken ([string $ctx = ''])
```

- `$ctx` _(string)_ Ключ Context, откуда читать, по умолчанию `''` — текущий Context.

## Пример

``` php
$token = $modx->user->getUserToken($modx->context->get('key'));
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.generateToken](extending-modx/core-model/moduser/moduser.generatetoken)
- [modUser.removeSessionContextVars](extending-modx/core-model/moduser/moduser.removesessioncontextvars)
- [Security](extending-modx/security)
