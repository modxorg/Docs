---
title: "xPDOGenerator.outputMeta"
_old_id: "1904"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.outputmeta"
---

## xPDOGenerator::outputMeta

Writes the `metadata.{platform}.php` file for the parsed schema. For schema version 3.0 and higher, the file contains the `version`, `namespace`, `namespacePrefix`, and `class_map` envelope that enables PSR-4 autoloading of the package; older versions produce a flat class map.

## Syntax

``` php
boolean outputMeta (string $path, [string $namespacePrefix = ''])
```

## Example

``` php
$generator->outputMeta(MODX_CORE_PATH . 'components/mypackage/model/', 'MyVendor\\MyPackage\\');
```

## See Also

- [outputClasses](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputclasses "outputClasses")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")