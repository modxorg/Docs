---
title: "modResource.duplicate"
translation: "extending-modx/core-model/modresource/modresource.duplicate"
description: "Дублировать ресурс вместе с ТВ и группами"
---

## modResource.duplicate

Создаёт копию ресурса со свежим ID. `pagetitle` сохраняется, если не переданы `newName` или `prefixDuplicate`, а поля публикации следуют `publishedMode`. Значения Template Variables и членство в группах ресурсов тоже копируются.

Возвращает новый `modResource`, строку лексикона `resource_err_duplicate`, если копию не удалось сохранить, либо `false` вне `modX`. Дочерние ресурсы дублируются рекурсивно, пока не отключено `duplicateChildren`; рекурсия останавливается, если у пользователя нет политики `add_children`.

## Синтаксис

``` php
mixed duplicate ([array $options = array()])
```

- `newName` _(string)_ pagetitle для копии
- `prefixDuplicate` _(boolean)_ добавить к pagetitle префикс из записи лексикона `duplicate_of`
- `publishedMode` _(string)_ `preserve` (по умолчанию), `publish` или `unpublish`
- `overrides` _(array)_ значения полей, накладываемые на копию
- `parent` _(int)_ родитель копии, по умолчанию тот же родитель
- `preserve_alias` _(boolean)_ оставить исходный alias вместо его пересборки, по умолчанию `false`
- `preserve_menuindex` _(boolean)_ оставить исходный menuindex вместо дописывания в конец, по умолчанию `false`
- `global_duplicate_uri_check` _(boolean)_ проверять уникальность alias во всех контекстах, по умолчанию `false`
- `duplicateChildren` _(boolean)_ дублировать и потомков, по умолчанию `true`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$copy = $resource->duplicate(array(
    'newName' => 'foobar copy',
    'publishedMode' => 'unpublish',
));
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
