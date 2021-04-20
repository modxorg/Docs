---
title: "modX.getUser"
translation: "extending-modx/modx-class/reference/modx.getuser"
description: "Получение текущего аутентифицированного пользователя и назначение его экземпляру modX"
---

## modX::getUser

Получение текущего аутентифицированного пользователя и назначение его экземпляру modX.

## Синтаксис

API Doc: [modX::getUser()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getUser())

``` php
modUser getUser ([string $contextKey = ''], [bool $forceLoadSettings = false])
```

- `$contextKey` _(string)_ Указывает контекст для инициализации, необязательный контекст, из которого нужно получить пользователя.
- `$forceLoadSettings` _(bool)_ Если установлено значение true, будут загружаться настройки независимо от того, есть ли у пользователя аутентифицированный контекст или нет. 

## Пример

Получить текущего авторизованного пользователя и распечатать его имя.

``` php
$user = $modx->getUser();
echo $user->get('username');
```

Получить адрес электронной почты пользователя (хранится в его профиле) из 'web' контекста:

``` php
$user = $modx->getUser('web', true);
if (!$user) return '';
$profile = $user->getOne('Profile');
if (!$profile) return '';
print $profile->get('email');
```

Получите расширенное поле от пользователя.

``` php
$user = $modx->getUser();
if (!$user) return '';
$profile = $user->getOne('Profile');
if (!$profile) return '';
$extended = $profile->get('extended');
print (isset($extended['custom_user_field'])) ? $extended['custom_user_field'] : '';
```

## Смотрите также

- [modX](extending-modx/core-model/modx "modX")
- [modx.getAuthenticatedUser](extending-modx/modx-class/reference/modx.getauthenticateduser)
