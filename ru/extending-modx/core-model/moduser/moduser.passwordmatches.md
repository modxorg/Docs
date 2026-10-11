---
title: "modUser.passwordMatches"
translation: "extending-modx/core-model/moduser/moduser.passwordmatches"
description: "Сверить открытый пароль с хешем, сохранённым у пользователя"
---

## modUser::passwordMatches

Кандидат хешируется классом из `hash_class` через сервис хеширования, после чего результат сравнивается с полем `password`. Им пользуется `changePassword()` для проверки старого пароля.

`$options` накладываются поверх `salt` самого пользователя, поэтому переданный здесь ключ `salt` побеждает. Что ещё значимо, решает реализация хеша: `modPBKDF2` читает `salt`, `iterations`, `derived_key_length`, `algorithm` и `raw_output`, а дефолтный `modNative` вызывает `password_verify()` и эти ключи игнорирует. Сервис хеширования не загрузился — метод вернёт `false`.

## Синтаксис

``` php
boolean passwordMatches (string $password [, array $options = array()])
```

- `$password` _(string)_ Открытый пароль для сверки с сохранённым хешем.
- `$options` _(array)_ Настраиваемые параметры хеширования, зависят от реализации, по умолчанию `array()`.

## Пример

``` php
$user = $modx->getObject('modUser', array('username' => 'foobar'));

if ($user->passwordMatches('s3cur3d')) {
    echo 'ok';
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.changePassword](extending-modx/core-model/moduser/moduser.changepassword)
