---
title: "modUser.getUserGroups"
translation: "extending-modx/core-model/moduser/moduser.getusergroups"
description: "Список id групп пользователей, в которые входит пользователь"
---

## modUser::getUserGroups

Возвращает id записей `modUserGroup`, связанных с пользователем через `modUserGroupMembers`. Id, а не имена: имена того же набора членства возвращает `getUserGroupNames()`.

Результат кэшируется в сеансе под `modx.user.{id}.userGroups`, и читается он только когда объект принадлежит вошедшему пользователю. Любой другой пользователь каждый раз уходит в базу, а найденный результат перезаписывает запись кэша.

## Синтаксис

``` php
array getUserGroups ()
```

## Пример

``` php
foreach ($user->getUserGroups() as $groupId) {
    echo $groupId;
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getUserGroupNames](extending-modx/core-model/moduser/moduser.getusergroupnames)
- [modUser.isMember](extending-modx/core-model/moduser/moduser.ismember)
