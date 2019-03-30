---
title: "modX.getContext"
_old_id: "1064"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getcontext"
---

## modX::getContext

Retrieve a context by name without initializing it.

Within a request, contexts retrieved using this function will cache the context data into the modX::$contexts array to avoid loading the same context multiple times.

If you merely want to check the current context, you can return the context key:

``` php 
$modx->context->key;
```

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::getContext()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::getContext())

``` php 
&$modContext getContext (string $contextKey)
```

## Example

Get the 'sports' Context.

``` php 
$ctx = $modx->getContext('sports');
```

## See Also

| Page: [modX](extending-modx/core-model/modx) |
|---------------------------------------------------------------------------------------------------|
| Page: [Contexts](building-sites/contexts) |
| Page: [modX.getContext](extending-modx/modx-class/reference/modx.getcontext) |