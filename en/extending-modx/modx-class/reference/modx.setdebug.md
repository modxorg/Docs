---
title: "modX.setDebug"
description: "Sets the MODX debug level"
---

## modX::setDebug

Sets the debugging features of the modX instance.

## Syntax

``` php
boolean|int setDebug ([boolean|int $debug = true])
```

- `$debug` _(boolean|int)_ Boolean or bitwise integer describing the debug state and/or PHP error reporting level. The strings `'true'`, `'false'`, `'0'`, `'-1'` and constant names such as `'E_ALL'` are accepted as well.

Returns the **previous** debug value, so the caller can restore it later.

## Example

Turn debug mode on: log messages from `LOG_LEVEL_DEBUG` and enable full PHP error reporting.

``` php
$oldDebug = $modx->setDebug(true);
```

## See Also

- [log_level](building-sites/settings/log_level)
