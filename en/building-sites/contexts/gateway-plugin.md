---
title: "Using a Gateway Plugin"
description: "Serving several domains from one MODX installation: switching the context by host with a Plugin on OnHandleRequest, or with a gateway of its own."
---

One installation can serve several domains. The context of the request is what tells them apart, and two mechanisms choose it: a Plugin that switches the context, or a gateway file that starts in it.

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

## A Gateway of Its Own

This mechanism needs no Plugin. The file `index.php` reads the context from `config.context.php` next to it:

``` php
<?php
return 'domain2';
```

When the file is absent, the request starts in the `web` context. A directory of its own — a copy of `index.php`, `config.core.php` and `.htaccess` plus its own `config.context.php` — is a separate gateway for that domain: see [Serving a Second Domain](building-sites/contexts/virtual-host).

## The Session Handler

Switching the context at runtime does not load a custom session handler: the handler is set by the gateway and applies to the whole request. A context with a session handler of its own needs a gateway of its own: see [Serving a Second Domain](building-sites/contexts/virtual-host).

## See Also

1. [Contexts](building-sites/contexts)
2. [Serving a Second Domain](building-sites/contexts/virtual-host)
3. [OnHandleRequest](extending-modx/plugins/system-events/onhandlerequest)
4. [GatewayManager](extras/gatewaymanager)
