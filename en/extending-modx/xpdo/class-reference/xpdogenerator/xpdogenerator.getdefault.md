---
title: "xPDOGenerator.getDefault"
_old_id: "1902"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.getdefault"
---

## xPDOGenerator::getDefault

Returns the default value to use for a field definition, as configured in the generator. Used when emitting class and map files.

## Syntax

``` php
mixed getDefault (mixed $value)
```

## Example

``` php
$generator = $manager->getGenerator();
$default = $generator->getDefault('0');
```

## See Also

- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")