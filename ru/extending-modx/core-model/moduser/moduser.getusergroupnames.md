---
title: "modUser.getUserGroupNames"
translation: "extending-modx/core-model/moduser/moduser.getusergroupnames"
description: "Список имён групп пользователей, в которые входит пользователь"
---

## modUser::getUserGroupNames

Возвращает `name` каждой группы, в которую входит пользователь. Идентификаторы того же набора членства отдаёт `getUserGroups()`. Списком из этого метода сравнивает имена `isMember()`.

Кэш сеанса `modx.user.{id}.userGroupNames` читается только для вошедшего пользователя — правило то же, что в `getUserGroups()`. Любого другого пользователя метод каждый раз запрашивает в базе.

## Синтаксис

``` php
array getUserGroupNames ()
```

## Пример

``` php
foreach ($user->getUserGroupNames() as $name) {
    echo $name;
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getUserGroups](extending-modx/core-model/moduser/moduser.getusergroups)
- [modUser.isMember](extending-modx/core-model/moduser/moduser.ismember)
