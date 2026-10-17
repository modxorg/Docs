---
title: "xPDOGenerator.outputClasses"
_old_id: "1903"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.outputclasses"
---

## xPDOGenerator::outputClasses

Writes the generated PSR-4 PHP class files for the parsed schema into the given directory. `$update` controls which files are rewritten (0 = none, 1 = platform classes only, 2 = all), and `$regenerate` forces regeneration.

## Syntax

``` php
boolean outputClasses (string $path, [integer $update = 1], [integer $regenerate = 0], [string $namespacePrefix = ''])
```

## Example

``` php
$generator->outputClasses(MODX_CORE_PATH . 'components/mypackage/model/', 2, 0, 'MyVendor\\MyPackage\\');
```

## See Also

- [outputMeta](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputmeta "outputMeta")
- [parseSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.parseschema "parseSchema")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")