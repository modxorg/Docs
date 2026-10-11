---
title: "modUser.joinGroup"
translation: "extending-modx/core-model/moduser/moduser.joingroup"
description: "Добавить пользователя в группу, при желании с Role и рангом"
---

## modUser::joinGroup

Сначала метод ищет группу: если её нет, возвращает `false` и пишет запись в журнал ошибок. Отсутствующая Role даёт тот же результат. Пустой `$roleId` оставляет роль на значении по умолчанию для колонки.

По умолчанию `$rank` равен числу записей членства у пользователя. Существующее членство возвращает `true` и ничего не меняет, поэтому роль и ранг уже члена не перезаписываются. После успешной вставки из сеанса сбрасываются кэши списков id и имён групп.

## Синтаксис

``` php
boolean joinGroup (mixed $groupId [, mixed $roleId = null [, integer $rank = null]])
```

- `$groupId` _(mixed)_ Имя (string) или id группы, в которую вступаем.
- `$roleId` _(mixed)_ Имя (string) или id Role, по умолчанию `null`.
- `$rank` _(integer)_ Ранг членства, по умолчанию `null` — взять число существующих членств.

## Пример

``` php
$user->joinGroup('staff', 'Member');
$user->joinGroup(5, null, 3);
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.leaveGroup](extending-modx/core-model/moduser/moduser.leavegroup)
- [User Groups](building-sites/client-proofing/security/user-groups)
