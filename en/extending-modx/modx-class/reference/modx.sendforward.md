---
title: "modX.sendForward"
description: "modX.sendForward forwards the request to another resource without changing the URL"
---

## modX::sendForward

Forwards the request to another resource without changing the URL. If the ID provided does not exist, sends to a 404 Error page.

## Syntax

API Doc: [modX::sendForward()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendForward())

``` php
void sendForward (integer $id, [string|array $options = null], [boolean $sendErrorPage = true])
```

- `$id` is a Resource ID (you cannot sendForward to an URL - if you need to pass some value, use `modX::setPlaceholder` and call that on the target resource).
- `$options` is assumed to be a proper HTTP response code when it is a string, eg "HTTP/1.1 301 Moved Permanently". If it's an array, you can use the following options:
    - `response_code`: response code, please see example below
    - `error_type`: response code type, please see example below. F.e. 404
    - `error_header`: "Header:" value
    - `error_pagetitle`: error pagetitle value
    - `error_message`: error message
    - `merge`: a way to merge the resource currently in `$modx->resource` with the target resource. The `content`, `pub_date`, `unpub_date`, `richtext`, `_content` and `_processed` values are excluded as well as the value of the [forward_merge_excludes](building-sites/settings/forward_merge_excludes) system setting. I'm not sure if this is supposed to be used out of the core and there's probably better ways to get data combined (eg: `setPlaceholder`) then merging.
- `$sendErrorPage` Whether we should skip the [sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage") if the resource does not exist.

## Examples

Send the user to Resource ID 234 without actually changing the URL.

``` php
$modx->sendForward(234);
```

Send user to 404 Error page, for actual page ID we use [error_page](building-sites/settings/error_page) system setting value. If there is no such value,
the value of [site_start](building-sites/settings/site_start) will be used.

``` php
$options = array(
   'response_code' => '404 Not Found',
   'error_type' => '404',
   'error_header' => '404 Not Found',
   'error_pagetitle' => 'Error 404: Page not found',
   'error_message' => '<h1>Page not found</h1><p>The page you requested was not found.</p>'
);
$this->sendForward($this->getOption('error_page', $options, $this->getOption('site_start')), $options, false);
```
Show replacement page, keeping original `pagetitle`, `introtext` and other fields. To do this, you just need to specify an additional array with keys:

``` php
$options = array(
	'merge' => 1, // field gluing mechanism enabled
	// original fields list that need to be excluded from the result
	'forward_merge_excludes' => 'id,template,type,published,class_key'
);
$this->sendForward(15, $options);;
```

[forward_merge_excludes](building-sites/settings/forward_merge_excludes) setting manages source page fields that need to be excluded from the results. Next fields will definitely be added as well: `content,pub_date,unpub_date,richtext`

This is good approach if you want hide/protect some resources but left `pagetitle` and `description` for visitors and search crawlers.

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage)
- [error_page](building-sites/settings/error_page)
- [forward_merge_excludes](building-sites/settings/forward_merge_excludes)
