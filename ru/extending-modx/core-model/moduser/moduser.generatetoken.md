---
title: "modUser.generateToken"
translation: "extending-modx/core-model/moduser/moduser.generatetoken"
description: "Собрать auth-токен пользователя из uniqid"
---

## modUser::generateToken

Токен строится из id сайта, id пользователя и `uniqid()`. Он различается от сайта к сайту и от пользователя к пользователю и уникален внутри запроса. Значение попадает в сеанс через `addSessionContext()`, а читает его оттуда `getUserToken()`.

## Синтаксис

``` php
string generateToken (string $salt)
```

- `$salt` _(string)_ Не используется; параметр нужен только чтобы закрыть сигнатуру.

## Пример

``` php
$token = $user->generateToken('web');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.addSessionContext](extending-modx/core-model/moduser/moduser.addsessioncontext)
- [modUser.getUserToken](extending-modx/core-model/moduser/moduser.getusertoken)
