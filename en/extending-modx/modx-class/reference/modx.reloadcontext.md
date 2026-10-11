---
title: "modX.reloadContext"
description: "Refreshes Context data in place or loads a secondary Context"
---

## modX::reloadContext

Without `$key`, it regenerates the current Context through `modX::_initContext()` and refreshes the `+` config placeholders. With `$key`, it loads that Context into `modX::$contexts` — even one that was never loaded — and does not switch to it.

Returns false when no Context is initialized and no key was given. The Resource Update processor calls it from `cleanup()` after a Resource was saved, unless the `_reloadContext` property is false.

## Syntax

``` php
boolean reloadContext ([string $key = null])
```

- `$key` _(string)_ Context to (re)load; by default `null` reloads the current one

## Example

``` php
$modx->reloadContext();      // refresh the Context in use
$modx->reloadContext('mgr'); // load another Context, stay where we are
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.switchContext](extending-modx/modx-class/reference/modx.switchcontext)
- [modX.initialize](extending-modx/modx-class/reference/modx.initialize)
