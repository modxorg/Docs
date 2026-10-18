---
title: "xPDO.setPackageMeta"
description: "Register package metadata from a metadata file."
_old_id: "1829"
_old_uri: "2.x/class-reference/xpdo/xpdo.setpackagemeta"
---

## xPDO::setPackageMeta

Reads the `metadata.{platform}.php` file of a package and registers its PSR-4 prefix with the Composer autoloader. The metadata envelope (`version`, `namespace`, `namespacePrefix`, `class_map`) is only used when the schema version is `3.0` or higher; for older versions the method falls back to the legacy class-map layout.

## Syntax

``` php
boolean setPackageMeta (string $pkg, [string $path = ''], [string|null $namespacePrefix = null])
```

## Example

``` php
$xpdo->setPackageMeta('MODX\\Revolution', MODX_CORE_PATH . 'src/', 'MODX\\');
```

## See Also

- [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")