---
title: "modUser.getPhoto"
translation: "extending-modx/core-model/moduser/moduser.getphoto"
description: "Определить URL аватара: фото профиля, Gravatar или заданная заглушка"
---

## modUser::getPhoto

Адрес аватара определяется в фиксированном порядке:

1. фото из профиля — через `getProfilePhoto()` с переданными размерами;
2. Gravatar, когда включена настройка `enable_gravatar`; в `getGravatar()` уходит только ширина;
3. иначе возвращается строка `$default` без изменений.

## Синтаксис

``` php
string getPhoto ([integer $width = 128 [, integer $height = 128 [, string $default = '']]])
```

- `$width` _(integer)_ Ширина фото, по умолчанию `128`.
- `$height` _(integer)_ Высота фото, по умолчанию `128`.
- `$default` _(string)_ URL на случай, когда не сработал ни один источник, по умолчанию `''`.

## Пример

``` php
echo $user->getPhoto(64, 64, '/assets/images/nophoto.png');
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getProfilePhoto](extending-modx/core-model/moduser/moduser.getprofilephoto)
- [modUser.getGravatar](extending-modx/core-model/moduser/moduser.getgravatar)
- [enable_gravatar](building-sites/settings/enable_gravatar)
