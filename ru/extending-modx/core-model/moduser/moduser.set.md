---
title: "modUser.set"
translation: "extending-modx/core-model/moduser/moduser.set"
description: "Присвоить поле пользователя, отклоняя sudo и хешируя пароль"
---

## modUser::set

Метод присваивает поле так же, как сеттер xPDO, но сначала перехватывает `sudo` и поля пароля.

`sudo` возвращает `false`, если на экземпляре xpdo не включена опция `setup`. Массовое присвоение из данных запроса так полный доступ себе не выдаст. Для этого есть `setSudo()`.

Если сервис хеширования загрузился, `password` и `cachepwd` перед записью хешируются классом из `hash_class`. У пользователя без `salt` соль генерируется при первой записи и дальше переиспользуется.

## Синтаксис

``` php
boolean set (mixed $k [, mixed $v = null [, string $vType = '']])
```

- `$k` _(mixed)_ Имя поля или ключ поля.
- `$v` _(mixed)_ Присваиваемое значение, по умолчанию `null`.
- `$vType` _(string)_ Callable или type hint для родительской реализации, по умолчанию `''`.

## Пример

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));

$user->set('sudo', 1);              // false вне setup
$user->set('password', 's3cur3d');  // сохранится как хеш
$user->save();
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.setSudo](extending-modx/core-model/moduser/moduser.setsudo)
- [modUser.changePassword](extending-modx/core-model/moduser/moduser.changepassword)
