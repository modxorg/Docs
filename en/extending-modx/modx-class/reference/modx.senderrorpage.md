---
title: "modX.sendErrorPage"
description: "Send the user to a MODX virtual error page."
_old_id: "1101"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.senderrorpage"
---

## modX::sendErrorPage

Send the user to a MODX virtual error page.

## Syntax

``` php
void sendErrorPage ([array $options = null])
```

Before forwarding, the [OnPageNotFound](extending-modx/plugins/system-events/onpagenotfound "OnPageNotFound") event is invoked with `$options`. The user is then sent to the resource configured in the [error_page](building-sites/settings/error_page) setting, falling back to [site_start](building-sites/settings/site_start) if that is not set.

`$options` may override the defaults filled from the `error_page_header`, `error_page_pagetitle` and `error_page_message` settings:

- `response_code`, `error_header` — HTTP header line (default `404 Not Found`)
- `error_type` — error type passed on to `sendError`, default `404`
- `error_pagetitle` — default `Error 404: Page not found`
- `error_message` — default `<h1>Page not found</h1><p>The page you requested was not found.</p>`
- `error_page` — resource id of the error page for this call only


## Example

Send the user to the default Error page for the site.

``` php
$modx->sendErrorPage();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage "modX.sendUnauthorizedPage")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
