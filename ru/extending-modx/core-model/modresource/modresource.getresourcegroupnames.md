---
title: "modResource.getResourceGroupNames"
translation: "extending-modx/core-model/modresource/modresource.getresourcegroupnames"
description: "Перечислить имена групп ресурсов, в которые входит ресурс"
---

## modResource.getResourceGroupNames

Возвращает имена групп ресурсов, членом которых является ресурс, — обычным массивом строк. Коллекция групп получается через `getCollectionGraph()` по связи `ResourceGroupResources`.

`isMember()` и проверка членства внутри `joinGroup()` построены на этом методе.

## Синтаксис

``` php
array getResourceGroupNames ()
```

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$names = $resource->getResourceGroupNames();
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.isMember](extending-modx/core-model/modresource/modresource.ismember)
- [modResource.getGroupsList](extending-modx/core-model/modresource/modresource.getgroupslist)
