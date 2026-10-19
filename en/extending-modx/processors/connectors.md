---
title: 'Connectors'
---

## What a connector is

A connector is a PHP entry point for AJAX (and similar) requests that should run a [processor](extending-modx/processors). It boots MODX, checks that the user may load the context, then hands the request to `modX::request->handleRequest()`, which calls [`runProcessor`](extending-modx/modx-class/reference/modx.runprocessor).

Connectors do not change the database themselves. Processors do.

## Core connector

Manager requests for core actions go through files under `connectors/` that include [`connectors/index.php`](https://github.com/modxcms/revolution/blob/3.x/connectors/index.php). That bootstrap:

1. Loads the MODX instance and initializes a context (default `mgr`, or `ctx` from the request).
2. Enforces a load policy unless the action is explicitly anonymous (for example `security/login`).
3. Sanitizes the request and routes `action` to a core processor.

Example shape of a request: your ExtJS grid posts to a connector URL with `action=resource/getlist` (plus auth headers MODExt adds for you).

## Extra processors

MODX 3.x has exactly one connector, `connectors/index.php`; manager requests are routed by `namespace`, not by a per-Component file. Nothing in core looks for `assets/components/<pkg>/connector.php`.

To route a request at your own processors, write a PHP file that includes the core connector and then handles the request itself. The connector skips its own `handleRequest()` when `MODX_CONNECTOR_INCLUDED` is already defined, which is what `config.core.php` does — so the include is enough:

`assets/components/myextra/connector.php`

```php
<?php
require_once dirname(__DIR__, 3) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption(
    'myextra.core_path',
    null,
    $modx->getOption('core_path') . 'components/myextra/'
);
// load your service / lexicon as needed …

$modx->request->handleRequest([
    'processors_path' => $corePath . 'processors/',
    'location' => '',
]);
```

`processors_path` tells MODX where `{action}.class.php` files live. The grid’s `baseParams.action` (for example `mgr/item/getlist`) maps to `processors/mgr/item/getlist.class.php`.

You must point the client at this file yourself — set `connectorUrl` to its URL in the grid config. MODX will not discover it.

## Auth and CSRF

Connectors expect a manager session (unless you deliberately open an anonymous action) and a site auth token. MODExt sends it as the `modAuth` HTTP header (or `HTTP_MODAUTH` in the request). The value is `$modx->siteId`. Do not put that value in public repositories or client-side docs.

Opening the connector URL in a browser with no session and no `action` usually returns JSON like `success: false` / access denied. That is expected.

## See also

- [Processors](extending-modx/processors)
- [Core processor list](extending-modx/processors/list)
- [Custom Manager Pages](extending-modx/custom-manager-pages)
- [MODExt FormPanel](extending-modx/custom-manager-pages/modext/modx.formpanel): posts through a connector URL
