---
title: "modUser.getGravatar"
translation: "extending-modx/core-model/moduser/moduser.getgravatar"
description: "Собрать URL аватара Gravatar из email профиля"
---

## modUser::getGravatar

Email из профиля обрезается, приводится к нижнему регистру и хешируется через `md5()`. К адресу аватара дописываются размер и стиль заглушки.

Метод не смотрит на настройку `enable_gravatar` — эту проверку выполняет `getPhoto()`, поэтому вызов всегда возвращает URL. Он рассчитывает на загруженный профиль с адресом почты.

## Синтаксис

``` php
string getGravatar ([integer $size = 128 [, string $default = 'retro']])
```

- `$size` _(integer)_ Размер картинки в пикселях, по умолчанию `128`.
- `$default` _(string)_ Стиль заглушки Gravatar, по умолчанию `retro`.

## Пример

``` php
echo $user->getGravatar(64, 'identicon');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getPhoto](extending-modx/core-model/moduser/moduser.getphoto)
- [enable_gravatar](building-sites/settings/enable_gravatar)
