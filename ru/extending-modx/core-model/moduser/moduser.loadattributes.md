---
title: "modUser.loadAttributes"
translation: "extending-modx/core-model/moduser/moduser.loadattributes"
---

## modUser::loadAttributes

Загружает основные атрибуты, которые определяют профиль безопасности modUser.

## Синтаксис

API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#%5CmodUser::loadAttributes()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::loadAttributes())

``` php
void loadAttributes ( $target, [ $context = ''], [ $reload = false])
```

## Пример

Загрузите атрибуты для 'sports' контекста и цели modResource.

``` php
$user->loadAttributes('modResource','sports',true);
```

## Смотрите также

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
