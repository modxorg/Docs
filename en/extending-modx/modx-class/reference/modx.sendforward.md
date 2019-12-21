---
title: "modX.sendForward"
_old_id: "1102"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.sendforward"
---

## modX::sendForward

Forwards the request to another resource without changing the URL. If the ID provided does not exist, sends to a 404 Error page.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::sendForward()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::sendForward())

``` php
void sendForward (integer $id, [string|array $options = null])
```

`$id` is a Resource ID (you cannot sendForward to an URL - if you need to pass some value, use `modX::setPlaceholder` and call that on the target resource).
`$options` is assumed to be a proper HTTP response code when it is a string, eg "HTTP/1.1 301 Moved Permanently". If it's an array, you can use the following options:

- `response_code`: the same as if you would pass a string to the `$options` var
- `merge`: a way to merge the resource currently in `$modx->resource` with the target resource. The content, pub\_date, unpub\_date, richtext, \_content and \_processed values are excluded as well as the value of the `forward_merge_excludes` system setting/another option key. I'm not sure if this is supposed to be used out of the core and there's probably better ways to get data combined (eg: setPlaceholder) then merging.

## Example

Send the user to Resource ID 234 without actually changing the URL.

``` php
$modx->sendForward(234);
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [modX.makeUrl](extending-modx/modx-class/reference/modx.makeurl "modX.makeUrl")
- [modX.sendRedirect](extending-modx/modx-class/reference/modx.sendredirect "modX.sendRedirect")
- [modX.sendErrorPage](extending-modx/modx-class/reference/modx.senderrorpage "modX.sendErrorPage")
- [modX.sendUnauthorizedPage](extending-modx/modx-class/reference/modx.sendunauthorizedpage)
