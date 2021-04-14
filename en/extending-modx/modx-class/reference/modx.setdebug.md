---
title: "modX.setDebug"
description: "modX.setDebug for debug level set"
---

## modX::setDebug

Sets the debugging features of the modX instance.

## Syntax

API Doc: [modX::setDebug()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::setDebug())

``` php
boolean|int setDebug ([boolean|int $debug = true])
```

- `$debug` _(string)_ Boolean or bitwise integer describing the debug state and/or PHP error reporting level

## Example

Turn debug mode on, and tell the process to stop if Notices occur:

``` php
$modx->setDebug(true);
```

## See Also

[log_level](building-sites/settings/log_level)