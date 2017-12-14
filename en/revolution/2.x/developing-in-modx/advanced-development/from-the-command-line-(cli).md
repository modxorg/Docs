---
title: "From the Command Line (CLI)"
_old_id: "359"
_old_uri: "2.x/developing-in-modx/advanced-development/from-the-command-line-(cli)"
---

MODX is built on the xPDO framework, and it's fully object-oriented and you can easily use it from the command line. Generally all you need to do is to identify the path to the MODX core directory and initialize MODX.

```
<pre class="brush: php">
define('MODX_CORE_PATH', '/some/path/to/your/core/');

require_once MODX_CORE_PATH . 'model/modx/modx.class.php';
 
$modx= new modX();
$modx->initialize('mgr');


```See Also
--------

[Loading MODx Externally](/revolution/2.x/developing-in-modx/other-development-resources/loading-modx-externally "Loading MODx Externally")