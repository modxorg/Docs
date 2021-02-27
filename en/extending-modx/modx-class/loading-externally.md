---
title: "Loading MODX Externally"
_old_id: "171"
_old_uri: "2.x/developing-in-modx/other-development-resources/loading-modx-externally"
---

## Loading the modX Object

Using the modX object (and all of its respective classes) is quite simple. All you need is this code:

``` php
require_once '/absolute/path/to/modx/config.core.php';
require_once MODX_CORE_PATH.'model/modx/modx.class.php';
$modx = new modX();
$modx->initialize('web');
$modx->getService('error','error.modError', '', '');
```

This will initialize the MODX object into the 'web' [Context](building-sites/contexts "Contexts"). Now, if you want to access it under a different context (and thereby changing its access permissions, policies, etc), you'll just need to change 'web' to whatever [Context](building-sites/contexts "Contexts") you want to load. This also loads the MODX error handler as well.

From there, you can use any MODX methods, functions, or classes.

## Another Example

Build scripts are a great place to see MODX loaded up from the command line. They usually begin with something like this:

``` php
if (!defined('MODX_CORE_PATH')) {
        define('MODX_CORE_PATH', '/path/to/core/');
}
if (!defined('MODX_CONFIG_KEY')) {
        define('MODX_CONFIG_KEY', 'config');
}
require_once( MODX_CORE_PATH . 'model/modx/modx.class.php');
$modx = new modX();
$modx->initialize('mgr');
```

## Deprecated Example

This example is deprecated. So better change your code, if you still use the MODX\_API\_MODE.

In You can also use MODX in its API mode, and then include the primary index.php file for your site:

 ``` php
define('MODX_API_MODE', true);
// Full path to the index
require_once('/path/to/modx/public_html/index.php');
$modx->initialize('mgr');
```

## See Also

- [Developer Introduction](extending-modx/getting-started/developer-introduction "Developer Introduction")
- [xPDO](extending-modx/xpdo "Home"), the db-layer for Revolution
