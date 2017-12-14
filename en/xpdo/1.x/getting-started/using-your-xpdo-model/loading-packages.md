---
title: "Loading Packages"
_old_id: "1542"
_old_uri: "1.x/getting-started/using-your-xpdo-model/loading-packages"
---

Packages are loaded in xPDO via the addPackage method. This method takes 3 parameters: 'name', 'path' and 'table\_prefix'. Name is the name of the model package, whereas path is an absolute path to that model directory. The table\_prefix states what the table prefix for the tables of the classes will be. If it's not set, it will default to the xPDO connection default. Let's say we have a xPDO model package already built (with all the maps and classes) in:

> /myapp/core/model/boxpackage/

And our table prefix is 'myapp\_'. So, we'll pass the first parameter as the package name - in this case 'boxpackage' - and the model path as the 2nd parameter:

```
<pre class="brush: php">
$xpdo->addPackage('boxpackage','/myapp/core/model/','myapp_');

```From then on out, any of our classes in our Package can be loaded via xPDO's retrieval methods.