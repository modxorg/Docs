---
title: "Loading MODX Externally"
_old_id: "171"
_old_uri: "2.x/developing-in-modx/other-development-resources/loading-modx-externally"
---

## Loading the modX Object

Using the modX object (and all of its respective classes) is quite simple. All you need is this code:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH . 'vendor/autoload.php';
$modx = new \MODX\Revolution\modX();
$modx->initialize('web');
```

This will initialize the MODX object into the 'web' [Context](building-sites/contexts "Contexts"). Now, if you want to access it under a different context (and thereby changing its access permissions, policies, etc), you'll need to change 'web' to whatever [Context](building-sites/contexts "Contexts") you want to load. 

From there, you can use any MODX methods, functions, or classes.

## See Also

- [Developer Introduction](extending-modx/getting-started/developer-introduction "Developer Introduction")
- [xPDO](extending-modx/xpdo "Home"), the db-layer for Revolution
