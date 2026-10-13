---
title: "modX.sendForward"
description: "Forwards the request to another resource without changing the URL"
---

## modX::sendForward

Forwards the request to another resource without changing the URL. If the ID provided does not exist, sends to a 404 Error page.

## Syntax

``` php
void sendForward (integer $id, [string|array $options = null], [boolean $sendErrorPage = true])
```

- `$id` _(integer)_ The target is a Resource ID, not a URL — to pass a value to the target, set a placeholder with [modX.setPlaceholder](extending-modx/modx-class/reference/modx.setplaceholder "modX.setPlaceholder") and read it there.
- `$options` _(string|array)_ A string is assumed to be an HTTP response code, e.g. `HTTP/1.1 301 Moved Permanently`. An array accepts the following keys:
    - `response_code`: response code
    - `error_type`: response code type, e.g. `404`
    - `error_header`: "Header:" value
    - `error_pagetitle`: error pagetitle value
    - `error_message`: error message
    - `merge`: a way to merge the resource currently in `$modx->resource` with the target resource. The `content`, `pub_date`, `unpub_date`, `richtext`, `_content` and `_processed` values are excluded as well as the value of the [forward_merge_excludes](building-sites/settings/forward_merge_excludes) system setting.
- `$sendErrorPage` _(boolean)_ Whether we should skip the [sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage") if the resource does not exist.

## Examples

Send the user to Resource ID 234 without changing the URL.

``` php
$modx->sendForward(234);
```

Send the user to a 404 error page. The page ID comes from the [error_page](building-sites/settings/error_page) system setting; without it, [site_start](building-sites/settings/site_start) is used.


``` php
$options = array(
   'response_code' => '404 Not Found',
   'error_type' => '404',
   'error_header' => '404 Not Found',
   'error_pagetitle' => 'Error 404: Page not found',
   'error_message' => '<h1>Page not found</h1><p>The page you requested was not found.</p>'
);
$modx->sendForward($modx->getOption('error_page', $options, $modx->getOption('site_start')), $options, false);
```

Show a replacement page while keeping the original `pagetitle`, `introtext` and other fields — pass an extra array with these keys:

``` php
$options = array(
	'merge' => 1, // field gluing mechanism enabled
	// original fields list that need to be excluded from the result
	'forward_merge_excludes' => 'id,template,type,published,class_key'
);
$modx->sendForward(15, $options);
```

Useful when you hide or protect a resource but keep its `pagetitle` and `description` for visitors and search crawlers.

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage)
- [error_page](building-sites/settings/error_page)
- [forward_merge_excludes](building-sites/settings/forward_merge_excludes)
