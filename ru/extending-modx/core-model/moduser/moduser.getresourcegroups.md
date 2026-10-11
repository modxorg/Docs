---
title: "modUser.getResourceGroups"
translation: "extending-modx/core-model/moduser/moduser.getresourcegroups"
description: "Список id групп ресурсов, доступных пользователю в Context"
---

## modUser::getResourceGroups

Возвращает id групп ресурсов, доступных пользователю в заданном Context. Пустой `$ctx` означает текущий Context.

Значения приходят из записи сеанса, которую пишет `modAccessResourceGroup::loadAttributes()`. Записи нет — атрибуты принудительно перезагружаются, после чего чтение повторяется. Без доступа к группам ресурсов массив остаётся пустым. Внутри лежат id, а не имена: `modResourceGroup::hasAccess()` сравнивает их со своим id.

## Синтаксис

``` php
array getResourceGroups ([string $ctx = ''])
```

- `$ctx` _(string)_ Ключ Context, для которого нужна проверка, по умолчанию `''` — текущий Context.

## Пример

``` php
$groups = $user->getResourceGroups('web');
foreach ($groups as $groupId) {
    echo $groupId;
}
```

## Смотрите также

- [modUser](extending-modx/core-model/moduser)
- [modUser.loadAttributes](extending-modx/core-model/moduser/moduser.loadattributes)
