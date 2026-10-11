---
title: "modUser.getPrimaryGroup"
translation: "extending-modx/core-model/moduser/moduser.getprimarygroup"
description: "Вернуть основную modUserGroup пользователя с запасным вариантом по рангу"
---

## modUser::getPrimaryGroup

Когда пользователь не аутентифицирован в текущем Context, метод сразу возвращает `null`. На объекте без сеанса он бесполезен.

Дальше читается агрегат PrimaryGroup за колонкой `primary_group`. Без неё берётся запись членства с наименьшим рангом, а если пользователь не состоит вообще ни в одной группе, остаётся `null`. С этого метода начинается `getDashboard()`.

## Синтаксис

``` php
modUserGroup|null getPrimaryGroup ()
```

## Пример

``` php
$group = $user->getPrimaryGroup();
if ($group) {
    echo $group->get('name');
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getDashboard](extending-modx/core-model/moduser/moduser.getdashboard)
- [modUser.getUserGroups](extending-modx/core-model/moduser/moduser.getusergroups)
