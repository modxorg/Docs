---
title: "modX.getResponse"
description: "Attempt to load the response handler class, if not already loaded."
_old_id: "1074"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.getresponse"
---

## modX::getResponse

Attempt to load the response handler class, if not already loaded. Defaults to `MODX\Revolution\modResponse`.

## Syntax

``` php
boolean getResponse ([string $class = MODX\Revolution\modResponse], [string $path = ''])
```

- `$class` _(string)_ The class name of the response handler to load. Ignored when the `modResponse.class` system setting is set — the setting wins.
- `$path` _(string)_ Unused in `modX`: the class is resolved through the autoloader, no path is read.

Returns `true` if a valid response handler object was loaded on this or any previous call, `false` otherwise.

## Example

``` php
$modx->response; // current response handler instance
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
