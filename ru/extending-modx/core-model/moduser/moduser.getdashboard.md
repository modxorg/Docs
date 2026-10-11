---
title: "modUser.getDashboard"
translation: "extending-modx/core-model/moduser/moduser.getdashboard"
description: "Вернуть modDashboard, назначенный первичной группе пользователя"
---

## modUser::getDashboard

Метод читает связь Dashboard у первичной группы. Если первичной группы нет либо у группы своего Dashboard нет, выполняется переход к `modDashboard::getDefaultDashboard()`: тот сначала ищет запись с id `1`, затем с именем `Default`.

Оба поиска возвращают `null`, когда записи нет, и метод это значение не обрабатывает. Проверяйте результат до использования.

## Синтаксис

``` php
modDashboard getDashboard ()
```

## Пример

``` php
$dashboard = $user->getDashboard();
if ($dashboard) {
    echo $dashboard->get('name');
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getPrimaryGroup](extending-modx/core-model/moduser/moduser.getprimarygroup)
