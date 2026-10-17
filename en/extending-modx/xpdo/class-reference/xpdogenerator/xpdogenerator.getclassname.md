---
title: "xPDOGenerator.getClassName"
_old_id: "1901"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.getclassname"
---

## xPDOGenerator::getClassName

Converts a database table name into the class name that would be generated for it, following the generator's naming rules.

## Syntax

``` php
string getClassName (string $string)
```

## Example

``` php
$generator = $manager->getGenerator();
$class = $generator->getClassName('my_model');
```

## See Also

- [getTableName](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.gettablename "getTableName")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")