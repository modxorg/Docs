---
title: "modX.sendRedirect"
description: "Sends a redirect to the specified URL using the specified method."
_old_id: "1103"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendredirect"
---

## modX::sendRedirect

Sends a redirect to the specified URL using the specified method.

## Syntax

``` php
void sendRedirect (string $url, [array|boolean $options = false], [string $type = ''], [string $responseCode = ''])
```

`$url` must be a valid URL — [modX::makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl") builds one. An empty URL is not redirected: the method writes an error to the log and returns without sending a header.

`$type` and `$responseCode` are deprecated since 2.0.5 in favour of the `type` and `responseCode` keys of `$options`. 3.x still accepts them, but each use writes a deprecation record to the log — pass the values in the `$options` array instead.

`$options` accepts an array (or a boolean, treated as the `count_attempts` flag) with one or more of the following key/value pairs:

- `type`, one of the following (`REDIRECT_HEADER` is the default):
    - `REDIRECT_REFRESH` - Uses the header refresh method
    - `REDIRECT_META` - Sends a META HTTP-EQUIV="Refresh" tag to the output
    - `REDIRECT_HEADER` - Uses the header location method
- `responseCode` the full HTTP status line, not just `301` or `302`. Defaults to `HTTP/1.1 302 Moved Temporarily`; pass `HTTP/1.1 301 Moved Permanently` for a permanent redirect.
- `count_attempts` _(boolean)_ appends an `?err=N` counter to the URL to break redirect loops. After 3 attempts — the limit is hard-coded — the redirect is treated as fatal: a FATAL entry is logged and a fatal error page is sent.
- `preserve_request` _(boolean)_ when set, the current request is preserved (see `modRequest::preserveRequest`) before the redirect, so the referrer survives.


## Examples

Redirect to the Resource with ID 54.

``` php
$url = $modx->makeUrl(54);
$modx->sendRedirect($url);
```

Send a redirect to modx.com via the META HTTP-EQUIV refresh tag.

``` php
$modx->sendRedirect('https://modx.com',array('type' => 'REDIRECT_META'));
```

Send the 301 Moved Permanently response code instead of the default 302 Moved Temporarily.

``` php
$modx->sendRedirect('https://modx.com',array('responseCode' => 'HTTP/1.1 301 Moved Permanently'));
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendForward](extending-modx/modx-class/reference/modx.sendforward "modX.sendForward")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
