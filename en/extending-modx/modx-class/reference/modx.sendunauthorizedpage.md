---
title: "modX.sendUnauthorizedPage"
description: "Send the user to the MODX unauthorized page."
_old_id: "1104"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendunauthorizedpage"
---

## modX::sendUnauthorizedPage

Send the user to the MODX unauthorized page.

## Syntax

``` php
void sendUnauthorizedPage ([array $options = null])
```

Before forwarding, the [OnPageUnauthorized](extending-modx/plugins/system-events/onpageunauthorized "OnPageUnauthorized") event is invoked with `$options`. The user is then sent to the resource configured in the [unauthorized_page](building-sites/settings/unauthorized_page) setting, falling back to [site_start](building-sites/settings/site_start) if that is not set.

`$options` may override the defaults filled from the `unauthorized_page_header`, `unauthorized_page_pagetitle` and `unauthorized_page_message` settings:

- `response_code`, `error_header` — HTTP header line (default `401 Unauthorized`)
- `error_type` — error type passed on to `sendError`, default `401`
- `error_pagetitle` — default `Error 401: Unauthorized`
- `error_message` — default `<h1>Unauthorized</h1><p>You are not authorized to view the requested content.</p>`
- `unauthorized_page` — resource id of the unauthorized page for this call only


## Example

Send the user to the unauthorized page. You do not need to terminate the script after running this.

``` php
$modx->sendUnauthorizedPage();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
