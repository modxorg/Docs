---
title: "xPDO.getLoader"
description: "Get the class loader used by the xPDO instance."
_old_id: "1861"
_old_uri: "2.x/class-reference/xpdo/xpdo.getloader"
---

## xPDO::getLoader

Returns the `Composer\Autoload\ClassLoader` instance used by xPDO to load model classes. You can use it to register additional PSR-4 prefixes.

## Syntax

``` php
\Composer\Autoload\ClassLoader getLoader ()
```

## Example

``` php
$loader = $xpdo->getLoader();
$loader->addPsr4('MyVendor\\', MODX_CORE_PATH . 'components/myvendor/src/');
```

## See Also

- [xPDO.loadClass](extending-modx/xpdo/class-reference/xpdo/xpdo.loadclass "xPDO.loadClass")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")