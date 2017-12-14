---
title: "As Service Layer"
_old_id: "1500"
_old_uri: "1.x/getting-started/fundamentals/xpdo,-the-class/as-service-layer"
---

In addition to PDO, xPDO can wrap other objects you may want to work with alongside your model.

For example, you could load smarty as an object that you can call directly from your xPDO instance:

```
<pre class="brush: php">
if ($className= $xpdo->loadClass('Smarty','/path/to/smarty/smarty.class.php', false, true)) {
    $xpdo->smarty= & new $className ($xpdo);
}

$xpdo->smarty->someFunc();

```