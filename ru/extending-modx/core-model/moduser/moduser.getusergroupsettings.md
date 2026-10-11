---
title: "modUser.getUserGroupSettings"
translation: "extending-modx/core-model/moduser/moduser.getusergroupsettings"
description: "Собрать значения modUserGroupSetting для всех групп пользователя"
---

## modUser::getUserGroupSettings

Метод собирает значения `modUserGroupSetting` для групп пользователя, а не из самой записи пользователя.

Строки приходят в порядке убывания ранга группы, затем убывания ранга участника. Более поздняя строка перезаписывает раннюю для того же ключа. Настройки `primary_group` собираются отдельно и накладываются последними, поэтому сильнее остальных. `getSettings()` сверху них ставит собственные UserSettings пользователя.

## Синтаксис

``` php
array getUserGroupSettings ()
```

## Пример

``` php
$groupSettings = $user->getUserGroupSettings();
$allSettings   = $user->getSettings();
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.getSettings](extending-modx/core-model/moduser/moduser.getsettings)
