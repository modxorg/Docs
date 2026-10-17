---
title: "xPDOManager.getGenerator"
_old_id: "1898"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.getgenerator"
---

## xPDOManager::getGenerator

Returns the driver-specific [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator") instance for this connection, used to parse schemas into classes or reverse-engineer schemas from tables. Returns `null` if the generator class cannot be instantiated.

## Syntax

``` php
xPDOGenerator|null getGenerator ()
```

## Example

``` php
$manager = $xpdo->getManager();
$generator = $manager->getGenerator();
$generator->parseSchema($schemaFile, $outputDir);
```

## See Also

- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")
- [xPDOManager](extending-modx/xpdo/class-reference/xpdomanager "xPDOManager")