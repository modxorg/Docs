---
title: "modX.getContext"
description: "Retrieve a context by name without initializing it."
_old_id: "1064"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getcontext"
---

## modX::getContext

Retrieve a context by name without initializing it. The context data is cached in the `$modx->contexts` array, so the same context is not loaded twice within a request. To check the current context, read the key directly instead:

``` php
$modx->context->key;
```

## Syntax

``` php
modContext getContext (string $contextKey)
```

## Example

Get the 'sports' Context.

``` php
$ctx = $modx->getContext('sports');
```

## See Also

- [modX](extending-modx/core-model/modx)
- [Contexts](building-sites/contexts)
