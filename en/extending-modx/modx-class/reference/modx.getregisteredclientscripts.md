---
title: "modX.getRegisteredClientScripts"
description: "Returns all registered JavaScript and HTML blocks."
_old_id: "1071"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientscripts"
---

## modX::getRegisteredClientScripts

Returns all registered JavaScript and HTML blocks.

## Syntax

``` php
string getRegisteredClientScripts ()
```

## Example

Get all registered scripts as a single HTML string (entries joined with newlines).

``` php
$scripts = $modx->getRegisteredClientScripts();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
