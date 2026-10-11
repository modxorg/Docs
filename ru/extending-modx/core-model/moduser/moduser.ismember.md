---
title: "modUser.isMember"
translation: "extending-modx/core-model/moduser/moduser.ismember"
description: "Проверить, входит ли пользователь в одну или несколько групп пользователей"
---

## modUser::isMember

 Указывает, является ли пользователь членом группы пользователей или нескольких групп пользователей. Вы можете указать либо строковое имя группы пользователей, либо массив имен групп пользователей.

## Синтаксис

``` php
boolean isMember (string|array $groups [, boolean $matchAll = false])
```

`$groups` — имя группы или массив имён групп. Задайте `$matchAll` со значением `true`, чтобы требовать членства во всех группах массива; по умолчанию достаточно входа хотя бы в одну. Если `$groups` — одиночная строка, `$matchAll` не действует.

## Пример

Получить объект пользователя:

``` php
$user = $modx->getObject('modUser', array('username' => 'boss'));
```

Посмотрите, входит ли пользователь в группу пользователей 'Staff':

``` php
$user->isMember('Staff');
```

Проверьте, входит ли пользователь в группу 'Staff' или 'Investors':

``` php
$user->isMember(array('Staff','Investors'));
```

Проверьте, входит ли пользователь одновременно в обе группы 'Staff' и 'Investors':

``` php
$user->isMember(array('Staff','Investors'), true);
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser "modUser")
