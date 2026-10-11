---
title: "modUser.getProfilePhoto"
translation: "extending-modx/core-model/moduser/moduser.getprofilephoto"
description: "Собрать URL phpthumb для фото из профиля пользователя"
---

## modUser::getProfilePhoto

Если в профиле нет `photo`, возвращается пустая строка. Иначе собирается запрос к коннектору phpthumb, где путь к фото лежит в `src`.

Id медиа-источника берётся из настройки `photo_profile_source`, а при пустой настройке — источник по умолчанию. Флаг `zc` включает обрезку: картинка режется под заданный прямоугольник, а не дополняется полями.

## Синтаксис

``` php
string getProfilePhoto ([integer $width = 128 [, integer $height = 128]])
```

- `$width` _(integer)_ Запрашиваемая ширина, по умолчанию `128`.
- `$height` _(integer)_ Запрашиваемая высота, по умолчанию `128`.

## Пример

``` php
echo $user->getProfilePhoto(32, 32);
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getPhoto](extending-modx/core-model/moduser/moduser.getphoto)
