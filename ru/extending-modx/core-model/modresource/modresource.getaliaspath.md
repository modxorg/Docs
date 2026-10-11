---
title: "modResource.getAliasPath"
translation: "extending-modx/core-model/modresource/modresource.getaliaspath"
description: "Построить полный путь alias ресурса"
---

## modResource.getAliasPath

Строит путь alias, который становится `uri` ресурса. Если задан `uri_override` и `uri` не пуст, замороженное значение возвращается без изменений. Иначе alias очищается и дополняется предками, когда в контексте включён `use_alias_path`. Путь заканчивается расширением типа содержимого либо `container_suffix` для папки.

Пустой `$alias` заменяется очищенным `pagetitle`, когда в контексте включён `automatic_alias`, а иначе — ID ресурса. `$fields` позволяет вычислить путь для значений, которых ещё нет на объекте.

## Синтаксис

``` php
string getAliasPath ([string $alias = '' [, array $fields = array()]])
```

- `$alias` _(string)_ alias, из которого строить путь, по умолчанию `''`
- `$fields` _(array)_ значения полей вместо собственных значений ресурса, по умолчанию `array()`

## Пример

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$uri = $resource->getAliasPath('about-us');
```

## Смотрите также

- [modResource](extending-modx/core-model/modresource)
- [modResource.cleanAlias](extending-modx/core-model/modresource/modresource.cleanalias)
- [modResource.isDuplicateAlias](extending-modx/core-model/modresource/modresource.isduplicatealias)
