---
title: "modUser.leaveGroup"
translation: "extending-modx/core-model/moduser/moduser.leavegroup"
description: "Удалить пользователя из группы пользователей"
---

## modUser::leaveGroup

Метод удаляет запись `modUserGroupMember`, которая связывает пользователя с группой.

Выход из группы, в которую пользователь не входит, фиксируется в журнале ошибок, и метод возвращает `false`. При успешном удалении сбрасываются кэши списков id и имён групп, поэтому следующий `getUserGroups()` видит изменение.

## Синтаксис

``` php
boolean leaveGroup (mixed $groupId)
```

- `$groupId` _(mixed)_ Имя (string) или id группы, из которой выходим.

## Пример

``` php
$user->leaveGroup('staff');
$user->leaveGroup(5);
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.joinGroup](extending-modx/core-model/moduser/moduser.joingroup)
- [User Groups](building-sites/client-proofing/security/user-groups)
