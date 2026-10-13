---
title: "modX.getRegisteredClientStartupScripts"
description: "Returns all registered startup CSS, JavaScript, or HTML blocks."
_old_id: "1072"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getregisteredclientstartupscripts"
---

## modX::getRegisteredClientStartupScripts

Returns all registered startup CSS, JavaScript, or HTML blocks.

## Syntax

``` php
string getRegisteredClientStartupScripts ()
```

## Example

Get all registered startup scripts as a single string (CSS/JS/HTML entries joined with newlines).

``` php
$startupScripts = $modx->getRegisteredClientStartupScripts();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
