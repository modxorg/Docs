---
title: "modResource.getGroupsList"
translation: "extending-modx/core-model/modresource/modresource.getgroupslist"
description: "Список групп ресурсов с флагом членства для ресурса"
---

## modResource.getGroupsList

Возвращает `collection` всех групп ресурсов в системе и `total` для постраничной навигации — из статического `listGroups()`. У каждой группы есть поле `access`: `1`, если ресурс в неё входит, и `0` в противном случае.

## Синтаксис

``` php
array getGroupsList ([array $sort = array('id' => 'ASC') [, int $limit = 0 [, int $offset = 0]]])
```

- `$sort` _(array)_ столбцы сортировки в формате `column => direction`, по умолчанию `array('id' => 'ASC')`
- `$limit` _(int)_ максимум возвращаемых строк, `0` отключает ограничение, по умолчанию `0`
- `$offset` _(int)_ смещение строк для ограниченной выборки, по умолчанию `0`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$result = $resource->getGroupsList(array('name' => 'ASC'), 20, 0);
foreach ($result['collection'] as $group) {
    echo $group->get('name') . ': ' . $group->get('access');
}
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getResourceGroupNames](extending-modx/core-model/modresource/modresource.getresourcegroupnames)
