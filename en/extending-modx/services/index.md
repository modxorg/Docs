---
title: "MODX Services"
_old_id: "204"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services"
---

## What is a Service?

A service is any object stored in the [dependency injection container](extending-modx/di-container) (`$modx->services`). In 2.x, and still in 3.x, many extras also load services with [$modx->getService](extending-modx/modx-class/reference/modx.getservice). That helper is deprecated in 3.x. Prefer `has` / `add` / `get` on `$modx->services`.

Once a service is in the container, you can also hang it on `$modx` yourself (`$modx->error = $modx->services->get('error')`). `getService` did that automatically.

``` php
$modx->services->add('twitter', function($c) use ($modx) {
    return new MyPackage\Twitter($modx, ['api_key' => 3212423]);
});
$modx->services->get('twitter')->tweet('Success!');
```

## What are the Default Included Services?

A list of the core-included MODX Services is as follows:

1. [modFileHandler](extending-modx/services/modfilehandler)
2. [modMail](extending-modx/services/modmail)
3. [modRegistry](developing-in-modx/advanced-development/modx-services/modregistry)

## See Also

- [modX.getService](extending-modx/modx-class/reference/modx.getservice)
- [Dependency Injection Container](extending-modx/di-container)
