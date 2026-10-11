---
title: "modResource.getCacheKey"
description: "Build the cache key of a Resource for a context"
---

## modResource::getCacheKey

Substitutes `[contextKey]` and `[id]` in the `_cacheKey` template, which the constructor sets to `[contextKey]/resources/[id]`.

With `$context` empty, the request context (`_contextKey`) is used, falling back to the `context_key` field. If the template contains no `[`, it is returned unchanged.

## Syntax

``` php
string getCacheKey ([string $context = ''])
```

- `$context` _(string)_ context key to build the key for, by default `''`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$key = $resource->getCacheKey('web');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.clearCache](extending-modx/core-model/modresource/modresource.clearcache)
