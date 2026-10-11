---
title: "modResource.cleanAlias"
description: "Turn a string into a valid URL path segment"
---

## modResource::cleanAlias

Filters a string into something that can be used as a URL path segment. The config of the Resource's context is merged under `$options`. Then `filterPathSegment()` of the Resource class applies HTML stripping, transliteration, character restrictions, lowercasing, trimming and the length limit.

The behavior is driven by the `friendly_alias_*` system settings, and `$options` overrides any of them for this call. `set()` uses the method whenever the `alias` field is assigned.

## Syntax

``` php
string cleanAlias ($alias [, array $options = array()])
```

- `$alias` _(string)_ string to filter
- `$options` _(array)_ filter options merged over the context config, by default `array()`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$alias = $resource->cleanAlias('Hello World');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.set](extending-modx/core-model/modresource/modresource.set)
- [modResource.getAliasPath](extending-modx/core-model/modresource/modresource.getaliaspath)
