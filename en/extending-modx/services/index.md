---
title: "MODX Services"
_old_id: "204"
_old_uri: "2.x/developing-in-modx/advanced-development/modx-services"
---

## What is a Service?

A service is any object stored in the [dependency injection container](extending-modx/di-container) (`$modx->services`). Many extras still load services with [$modx->getService](extending-modx/modx-class/reference/modx.getservice), a 2.x pattern that is deprecated in 3.x. Prefer `has` / `add` / `get` on `$modx->services`.

Once a service is in the container, you can also hang it on `$modx` yourself (`$modx->error = $modx->services->get('error')`). `getService` did that automatically.

``` php
$modx->services->add('twitter', function($c) use ($modx) {
    return new MyPackage\Twitter($modx, ['api_key' => 3212423]);
});
$modx->services->get('twitter')->tweet('Success!');
```

<!-- MEDIA: diagram | nice | The container: services registered while MODX starts, add() placing your own service, get() retrieving it, and getService() shown as the retired 2.x path | Draw it from this section and the dependency injection page -->

## What are the Default Included Services?

A few services are registered in the container during MODX initialization:

- `registry` — [modRegistry](extending-modx/services/modregistry), instantiated eagerly at the end of `modX::initialize()`;
- the seven PSR HTTP services listed on the [HTTP Services](extending-modx/services/http) page (`ClientInterface`, `ServerRequestFactoryInterface`, `RequestFactoryInterface`, `StreamFactoryInterface`, `ResponseFactoryInterface`, `UploadedFileFactoryInterface`, `UriFactoryInterface`);
- `modManagerDateFormatter` (registered under its class name), used by the manager;
- `lexicon`, `error` and `parser` are also placed in the container as initialization proceeds.

Other core services are part of the distribution but are loaded on demand via `$modx->getService` rather than pre-registered:

- [modFileHandler](extending-modx/services/modfilehandler)
- [modMail](extending-modx/services/modmail)

<!-- MEDIA: table | must | Every default service: its container key, when it is registered, and what it is for — registry, the seven PSR HTTP services, modManagerDateFormatter, lexicon, error, parser, modFileHandler, modMail | Collect the keys and the registration moment from the two lists above and from the pages they link to -->

## See Also

- [modX.getService](extending-modx/modx-class/reference/modx.getservice)
- [Dependency Injection Container](extending-modx/di-container)
