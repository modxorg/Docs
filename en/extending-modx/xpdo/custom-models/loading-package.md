---
title: "Loading Packages"
_old_id: "1194"
_old_uri: "2.x/getting-started/using-your-xpdo-model/loading-packages"
---

## What are xPDO Packages?

Packages are collections of maps and classes that represent tables in a database. It's the ORM layer, usually stored inside of a component's "model/" directory.

## How are they used?

Packages are loaded in xPDO via the addPackage method or the addExtensionPackage methods. The addPackage method is appropriate for plugins and Snippets that need to load up classes and table data on demand. addExtensionPackage is a convenience method which ultimately relies on addPackage. When a package is added via addExtensionPackage, it is loaded with each MODX request; it is more appropriate for packages that alter core functionality.

The addPackage method takes the package name, the absolute path to the model directory, and an optional table prefix. If you omit the prefix, xPDO uses the connection default (`xPDO::OPT_TABLE_PREFIX`), which in MODX is the site table prefix. **Do not pass a custom table prefix unless the package tables intentionally use a different prefix than MODX.** A hard-coded third argument overrides the MODX prefix and breaks installs that changed `table_prefix` (see [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage)).

Assume an xPDO model package (maps and classes) lives in:

> /myapp/core/model/boxpackage/

Load it with the connection prefix:

``` php
$xpdo->addPackage('boxpackage', '/myapp/core/model/');
```

From then on, load package classes through xPDO’s retrieval methods.

## Conclusion

Now that you've got your package loaded, you'll want to look into [creating objects](extending-modx/xpdo/creating-objects "Creating Objects"), or adding rows to your tables, with xPDO.

## See Also

- [addPackage()](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage)
- [extension\_packages](building-sites/settings/extension_packages)
