---
title: "Loading Packages"
_old_id: "1194"
_old_uri: "2.x/getting-started/using-your-xpdo-model/loading-packages"
---

What are xPDO Packages?
-----------------------

 Packages are collections of maps and classes that represent tables in a database. It's the ORM layer, usually stored inside of a component's "model/" directory.

How are they used?
------------------

 Packages are loaded in xPDO via the addPackage method or the addExtensionPackage methods. The addPackage method is appropriate for plugins and Snippets that need to load up classes and table data on demand. addExtensionPackage is a convenience method which ultimately relies on addPackage. When a package is added via addExtensionPackage, it is loaded with each MODX request; it is more appropriate for packages that alter core functionality.

The addPackage method takes 3 parameters: 'name', 'path' and an optional 'table\_prefix'. Name is the name of the model package, whereas path is an absolute path to that model directory. The table\_prefix states what the table prefix for the tables of the classes will be. If it's not set, it will default to the xPDO connection default. Let's say we have a xPDO model package already built (with all the maps and classes) in:

> /myapp/core/model/boxpackage/

 And our table prefix is 'myapp\_'. So, we'll pass the first parameter as the package name - in this case 'boxpackage' - and the model path as the 2nd parameter:

 ```
<pre class="brush: php">$xpdo->addPackage('boxpackage','/myapp/core/model/','myapp_');

``` From then on out, any of our classes in our Package can be loaded via xPDO's retrieval methods.

<div class="note"> Using the table\_prefix is not recommended unless you have a good reason to specifically set the table prefix. </div>Conclusion
----------

 Now that you've got your package loaded, you'll want to look into [creating objects](/xpdo/2.x/getting-started/using-your-xpdo-model/creating-objects "Creating Objects"), or adding rows to your tables, with xPDO.

See Also
--------

- [addPackage()](xpdo/2.x/class-reference/xpdo/xpdo.addpackage)
- [extension\_packages](revolution/2.x/administering-your-site/settings/system-settings/extension_packages)