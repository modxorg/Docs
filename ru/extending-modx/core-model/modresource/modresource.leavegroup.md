---
title: "modResource.leaveGroup"
translation: "extending-modx/core-model/modresource/modresource.leavegroup"
description: "Убрать ресурс из группы ресурсов"
---

## modResource.leaveGroup

Удаляет ресурс из группы ресурсов, удаляя строку `modResourceGroupResource`. В отличие от `joinGroup()`, флага `$byName` нет: целое число сопоставляется с `id`, всё остальное — с `name`.

Возвращает `false`, если группа не найдена или ресурс не входит в неё; оба случая пишутся в лог. Иначе возвращается результат удаления строки членства. Событие `OnResourceRemoveFromResourceGroup` вызывают процессоры, а не этот метод.

## Синтаксис

``` php
boolean leaveGroup ($resourceGroupPk)
```

- `$resourceGroupPk` _(int|string|modResourceGroup)_ ID, имя или объект группы

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->leaveGroup('staff');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.joinGroup](extending-modx/core-model/modresource/modresource.joingroup)
- [modResource.getResourceGroupNames](extending-modx/core-model/modresource/modresource.getresourcegroupnames)
