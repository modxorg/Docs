---
title: "modUser.isMember"
translation: "extending-modx/core-model/moduser/moduser.ismember"
---

## modUser::isMember

 Указывает, является ли пользователь членом группы пользователей или нескольких групп пользователей. Вы можете указать либо строковое имя группы пользователей, либо массив имен групп пользователей.

## Синтаксис

 API документация: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_moduser.class.html#\\\\modUser::isMember()](http://api.modx.com/revolution/2.2/db_core_model_modx_moduser.class.html#%5CmodUser::isMember())

``` php
boolean isMember (mixed $groups)
```

## Пример

Получить объект пользователя:

``` php
$user = $modx->getObject('modUser', array('username' => 'boss'));
```

Посмотрите, входит ли пользователь в группу пользователей 'Staff':

``` php
$user->isMember('Staff');
```

Посмотрите, является ли Пользователь членом ЛИБО группы пользователей 'Staff' или 'Investors'.

``` php
$user->isMember(array('Staff','Investors'));
```

Посмотрите, является ли Пользователь членом ОБА, группы пользователей 'Staff' и 'Investors'.

``` php
$user->isMember(array('Staff','Investors'), true);
```

## Смотрите также

- [modUser](developing-in-modx/other-development-resources/class-reference/moduser "modUser")
