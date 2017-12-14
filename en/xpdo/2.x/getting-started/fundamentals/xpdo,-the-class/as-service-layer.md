---
title: "As Service Layer"
_old_id: "1150"
_old_uri: "2.x/getting-started/fundamentals/xpdo,-the-class/as-service-layer"
---

In addition to PDO, xPDO can wrap other objects you may want to work with alongside your model.

For example, you could manually load smarty as an object that you can call directly from your xPDO instance:

```
<pre class="brush: php">
if ($className= $xpdo->loadClass('Smarty','/path/to/smarty/smarty.class.php', false, true)) {
    $xpdo->smarty= & new $className ($xpdo);
}

$xpdo->smarty->someFunc();

```But xPDO provides a convenience method for doing this in a single line:

```
<pre class="brush: php">
if ($xpdo->getService('myService', 'myServiceClass', '/path/to/model/root/', array('param1' => $param1, 'param2' => $param2)) {
    $xpdo->myService->doSomething();
}

```If the service instance has already been loaded in the current request, it will not be loaded again, but simply returned. This creates a simple way to provide reusable service objects for common tasks.