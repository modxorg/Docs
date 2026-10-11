---
title: "modX.checkSiteStatus"
description: "Decides whether the site answers public requests or returns a 503"
---

## modX::checkSiteStatus

Reports whether the site answers this request. `modRequest::handleRequest()` calls it right after `OnHandleRequest`.

True when either condition holds:

- the [site_status](building-sites/settings/site_status) setting is `'1'`;
- a session is initialized and the current policy grants `view_offline`.

A false result turns the request into a 503 that serves [site_unavailable_page](building-sites/settings/site_unavailable_page) or [site_unavailable_message](building-sites/settings/site_unavailable_message).

## Syntax

``` php
boolean checkSiteStatus ()
```

No parameters.

## Example

``` php
if (!$modx->checkSiteStatus()) {
    // the site is offline for this visitor
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [site_status](building-sites/settings/site_status)
- [site_unavailable_message](building-sites/settings/site_unavailable_message)
