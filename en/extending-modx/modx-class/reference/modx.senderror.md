---
title: "modX.sendError"
description: "Send the user to a type-specific core error page and halt PHP execution."
_old_id: "1100"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.senderror"
---

## modX::sendError

Send the user to a type-specific core error page and halt PHP execution. MODX ships two such pages: `unavailable` (the default) and `fatal`.

## Syntax

``` php
void sendError ([string $type = ''], [array $options = array()])
```

- `$type` _(string)_ Name of the error template in `core/error/{type}.include.php`. When empty, the value is taken from the `error_type` key of `$options`, defaulting to `unavailable`.
- `$options` _(array)_ Values used to build the error page:
    - `error_pagetitle` — the `<title>` of the page (default `Error 503: Service temporarily unavailable`)
    - `error_message` — the body HTML (default `<p>Site temporarily unavailable.</p>`)
    - `error_header` — the raw HTTP header line sent (default `HTTP/1.1 503 Service Unavailable`)
    - `error_type` — fallback for an empty `$type`

The method clears output buffers, sends the header, prints the page, closes the session and calls `exit()` — nothing after it runs.


## Examples

Send an Unavailable 503 error page.

``` php
$modx->sendError('unavailable');
```

Send a Fatal 500 error page.

``` php
$modx->sendError('fatal');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
