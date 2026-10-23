---
title: "Using a Gateway Plugin"
description: "Serving several domains from one MODX installation: the Plugin that switches the context by host, and the approach with a virtual host and a directory for every domain."
---

One installation can serve several domains. The request's context tells them apart. Two approaches do that:

- **One virtual host, several domains.** Every domain points at the same virtual host. A Plugin on `OnHandleRequest` reads the host and switches the context. This page covers this approach.
- **A virtual host and a directory for every domain.** Each domain gets its own virtual host and a gateway directory with its own `config.context.php`. See [Using Virtual Hosts](building-sites/contexts/virtual-host).

The first approach needs only the Plugin.

## Switching the Context by Host

`OnHandleRequest` fires at the start of every request, on the front end and in the manager.

``` php
<?php
if ($modx->context->get('key') === 'mgr') {
    return;
}

$hosts = [
    'domain2.tld' => 'domain2',
    'domain3.tld' => 'domain3',
];

$host = $_SERVER['HTTP_HOST'] ?? '';
if (isset($hosts[$host])) {
    $modx->switchContext($hosts[$host]);
}
```

The `return` keeps the manager in the `mgr` context.

`switchContext($contextKey, $reload = false)` returns `false` when the context was not loaded, and when the key is already the current context. In the second case the context is not loaded again. Check the result before the rest of the request relies on the new context:

``` php
if (!$modx->switchContext('domain2')) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'The context "domain2" was not found.');
}
```

On a request that is already in `domain2`, that check also fails, because the context was not switched.

## The Session Handler

Switching the context at runtime does not load a custom session handler. It does not change the language, the locale or the session cookie. Those come from the context that `index.php` started in. A domain that needs its own language or cookie uses its own directory with `config.context.php`. See [Using Virtual Hosts](building-sites/contexts/virtual-host).

## See Also

1. [Contexts](building-sites/contexts)
2. [Using Virtual Hosts](building-sites/contexts/virtual-host)
3. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
4. [GatewayManager](extras/gatewaymanager)
