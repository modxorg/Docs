---
title: "xPDO.setPackage"
description: "Register a package and set its table prefix as the default."
_old_id: "1828"
_old_uri: "2.x/class-reference/xpdo/xpdo.setpackage"
---

## xPDO::setPackage

Registers a package with xPDO, exactly like [addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage"), and additionally sets the package's table prefix as the global default prefix. The global prefix is used for classes that are not part of a registered package.

## Syntax

``` php
boolean setPackage (string $pkg = '', [string $path = ''], [string|null $prefix = null], [string|null $namespacePrefix = null])
```

## Example

``` php
$xpdo->setPackage('MyVendor\\MyPackage', MODX_CORE_PATH . 'components/mypackage/model/', null, 'MyVendor\\MyPackage\\');
```

## See Also

- [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage")
- [xPDO.setPackageMeta](extending-modx/xpdo/class-reference/xpdo/xpdo.setpackagemeta "xPDO.setPackageMeta")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")