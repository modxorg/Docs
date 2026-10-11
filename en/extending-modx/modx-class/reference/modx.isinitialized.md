---
title: "modX.isInitialized"
description: "Reports whether the modX instance finished initialize()"
---

## modX::isInitialized

Returns the flag that `initialize()` sets to true once the context, session, error handler and services are ready. The method only reports state; it never initializes anything.

## Syntax

``` php
boolean isInitialized ()
```

No parameters.

## Example

``` php
if (!$modx->isInitialized()) {
    $modx->initialize('web');
}
```

## See Also

- [modX](extending-modx/core-model/modx)
- [modX.initialize](extending-modx/modx-class/reference/modx.initialize)
