---
title: "modResource.getAliasPath"
description: "Build the full alias path of a Resource"
---

## modResource.getAliasPath

Builds the alias path that becomes the Resource `uri`. When `uri_override` is set and `uri` is not empty, the frozen value is returned unchanged. Otherwise the alias is cleaned and prefixed with the ancestors when the context has `use_alias_path`. The path ends with the content type extension, or with `container_suffix` for a folder.

An empty `$alias` falls back to the cleaned `pagetitle` when the context has `automatic_alias`, and to the Resource ID when it does not. `$fields` lets you compute the path for values that are not stored on the object yet.

## Syntax

``` php
string getAliasPath ([string $alias = '' [, array $fields = array()]])
```

- `$alias` _(string)_ alias to build the path from, by default `''`
- `$fields` _(array)_ field values to use instead of the Resource's own, by default `array()`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$uri = $resource->getAliasPath('about-us');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.cleanAlias](extending-modx/core-model/modresource/modresource.cleanalias)
- [modResource.isDuplicateAlias](extending-modx/core-model/modresource/modresource.isduplicatealias)
