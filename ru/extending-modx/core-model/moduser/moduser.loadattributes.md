---
title: "modUser.loadAttributes"
translation: "extending-modx/core-model/moduser/moduser.loadattributes"
description: "Загрузить атрибуты профиля безопасности пользователя"
---

## modUser::loadAttributes

Загружает основные атрибуты, которые определяют профиль безопасности modUser.

## Синтаксис

``` php
void loadAttributes (mixed $target, [string $context = ''], [boolean $reload = false])
```

`$target` — имя класса или массив имён классов `modAccess*`, права которых нужно загрузить, а не класс ресурса или контекста. По умолчанию `$context` — текущий контекст; `$reload` сбрасывает значения, закэшированные в сессии.

## Пример

Загрузить права групп ресурсов для контекста 'sports'.

``` php
$user->loadAttributes([\MODX\Revolution\modAccessResourceGroup::class], 'sports', true);
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser "modUser")
