---
title: "Using a Gateway Plugin"
description: "Serving several domains from one MODX installation: the Plugin that switches the context by host, and the approach with a virtual host and a directory for every domain."
---

One installation can serve several domains, and the context of the request is what tells them apart. Two approaches do that:

- **One virtual host, several domains.** Every domain points at the same virtual host, and a Plugin on `OnHandleRequest` reads the host and switches the context. This is the approach of this page.
- **A virtual host and a directory for every domain.** Each domain gets a virtual host of its own and a gateway directory with its own `config.context.php`. See [Using Virtual Hosts](building-sites/contexts/virtual-host).

The first approach needs nothing but the Plugin.

## Switching the Context by Host

The event `OnHandleRequest` fires at the start of every request — in the front end and in the manager alike. A Plugin on it reads the host and switches the context:

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

The early return keeps the manager in the `mgr` context.

`switchContext($contextKey, $reload = false)` returns `false` when the context was not loaded. Check the result before the rest of the request relies on the new context:

``` php
if (!$modx->switchContext('domain2')) {
    $modx->log(modX::LOG_LEVEL_ERROR, 'The context "domain2" was not found.');
}
```

## The Session Handler

Switching the context at runtime does not load a custom session handler: the handler is set by the gateway and applies to the whole request. A context with a session handler of its own needs a gateway of its own: see [Using Virtual Hosts](building-sites/contexts/virtual-host).

## See Also

1. [Contexts](building-sites/contexts)
2. [Using Virtual Hosts](building-sites/contexts/virtual-host)
3. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
4. [GatewayManager](extras/gatewaymanager)
