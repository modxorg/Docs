---
title: "xPDOGenerator.getTableName"
_old_id: "1900"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.gettablename"
---

## xPDOGenerator::getTableName

Returns the database table name for a class name, applying a table prefix. When `$prefixRequired` is true, the prefix must be present for a name to be returned.

## Syntax

``` php
string|null getTableName (string $string, [string $prefix = ''], [boolean $prefixRequired = false])
```

## Example

``` php
$generator = $manager->getGenerator();
$table = $generator->getTableName('MyVendor\\MyPackage\\MyModel', 'my_');
```

## See Also

- [getClassName](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassname "getClassName")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")