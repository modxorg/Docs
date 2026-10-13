---
title: "Loading MODX Externally"
description: "Bootstrap MODX from an external script: config file, autoloader and instance registry."
_old_id: "171"
_old_uri: "2.x/developing-in-modx/other-development-resources/loading-modx-externally"
---

## Loading the modX Object

Load MODX with the config file, the autoloader and an instance from the registry:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH . 'vendor/autoload.php';
$modx = \MODX\Revolution\modX::getInstance();
$modx->initialize('web');
```

This initializes MODX into the 'web' [Context](building-sites/contexts "Contexts"). To work with a different Context — with its own access permissions and policies — replace `'web'` with that Context's key.

Create the object with [modX.getInstance](extending-modx/modx-class/reference/modx.getinstance "modX.getInstance") rather than `new \MODX\Revolution\modX()`: only `getInstance()` registers it in the shared instance registry. An unregistered object is silently duplicated by the next `getInstance()` call.

## See Also

- [modX.getInstance](extending-modx/modx-class/reference/modx.getinstance "modX.getInstance")
- [Developer Introduction](extending-modx/getting-started/developer-introduction "Developer Introduction")
- [xPDO](extending-modx/xpdo "Home"), the database layer of Revolution
