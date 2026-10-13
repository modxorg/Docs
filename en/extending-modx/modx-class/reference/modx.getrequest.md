---
title: "modX.getRequest"
description: "Attempt to load the request handler class, if not already loaded."
_old_id: "1073"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getrequest"
---

## modX::getRequest

Attempt to load the request handler class, if not already loaded. Defaults to `MODX\Revolution\modRequest`.

## Syntax

``` php
boolean getRequest ([string $class = MODX\Revolution\modRequest], [string $path = ''])
```

- `$class` _(string)_ The class name of the request handler to load. Ignored when the `modRequest.class` system setting is set — the setting wins.
- `$path` _(string)_ Unused in `modX`: the class is resolved through the autoloader, no path is read.

Returns `true` if a valid request handler object was loaded on this or any previous call, `false` otherwise.

## Example

``` php
$modx->request; // current request handler, an instance of MODX\Revolution\modManagerRequest in the manager
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
