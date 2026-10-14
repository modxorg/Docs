---
title: "modX.getConfig"
description: "Get the configuration for the site."
_old_id: "1063"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getconfig"
---

## modX::getConfig

Get the configuration for the site.

## Syntax

``` php
array|null getConfig ()
```

Returns the configuration as an associative array, or `null` if the core configuration could not be loaded (this is also logged as a fatal error).

## Example

Get the site config into an array.

``` php
$config = $modx->getConfig();
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
