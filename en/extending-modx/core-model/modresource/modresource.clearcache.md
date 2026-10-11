---
title: "modResource.clearCache"
description: "Drop the cached copies of one Resource"
---

## modResource.clearCache

Deletes this Resource's cache entries from the `resource` cache provider, for the given or current context: the top-level entry and the Resource entry. Afterwards `OnResourceCacheUpdate` is invoked with the Resource ID when running under `modX`.

Core never calls the method — manager processors refresh the whole resource cache of a context instead. Call it when only one Resource must be dropped.

## Syntax

``` php
void clearCache ([string $context = ''])
```

- `$context` _(string)_ context key whose cache entry is dropped, by default `''` uses the current context

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->clearCache('web');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getCacheKey](extending-modx/core-model/modresource/modresource.getcachekey)
- [modResource.save](extending-modx/core-model/modresource/modresource.save)
