---
title: "modUser.getSettings"
translation: "extending-modx/core-model/moduser/moduser.getsettings"
description: "Получить настройки групп пользователя, перекрытые его собственными настройками"
---

## modUser::getSettings

Возвращает настройки групп пользователя, перекрытые настройками самого пользователя: сначала значения из `getUserGroupSettings()`, затем поверх них каждая запись из связи UserSettings. Настройка, есть ли она в обоих источниках, получает значение самого пользователя.

## Синтаксис

``` php
array getSettings ()
```

## Пример

Получить все настройки пользователя для этого пользователя.

``` php
$settings = $user->getSettings();
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser "modUser")
