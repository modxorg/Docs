---
title: "modUser.getSessionContexts"
translation: "extending-modx/core-model/moduser/moduser.getsessioncontexts"
description: "Получить список контекстов сеанса пользователя"
---

## modUser::getSessionContexts

Возвращает контексты сеанса пользователя в виде массива «ключ контекста => id пользователя».

## Синтаксис

``` php
array getSessionContexts ()
```

## Пример

Получить все сессии контекста пользователя, вошедшего в web и mgr контексты:

``` php
$keys = $user->getSessionContexts();
print_r($keys); // e.g. array('web' => 1, 'mgr' => 1);
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser "modUser")
