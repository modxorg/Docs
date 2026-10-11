---
title: "modResource.joinGroup"
translation: "extending-modx/core-model/modresource/modresource.joingroup"
description: "Добавить ресурс в группу ресурсов"
---

## modResource.joinGroup

Добавляет ресурс в группу ресурсов, сохраняя строку `modResourceGroupResource`. Обычное значение `$resourceGroupPk` сопоставляется по `id`, если это целое число, и по `name` — в остальных случаях.

Передавайте `$byName`, когда похожее на число имя группы приходит как целое: поиск будет принудительно направлен в столбец `name`. Возвращает `false`, если группы нет или ресурс уже состоит в ней — оба случая пишутся в журнал ошибок. События здесь не вызываются; процессоры сами вызывают `OnResourceAddToResourceGroup`.

## Синтаксис

``` php
boolean joinGroup ($resourceGroupPk [, boolean $byName = false])
```

- `$resourceGroupPk` _(int|string|modResourceGroup)_ ID, имя или объект группы
- `$byName` _(boolean)_ считать аргумент именем группы, даже если это целое число, по умолчанию `false`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->joinGroup('staff');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.leaveGroup](extending-modx/core-model/modresource/modresource.leavegroup)
- [modResource.isMember](extending-modx/core-model/modresource/modresource.ismember)
