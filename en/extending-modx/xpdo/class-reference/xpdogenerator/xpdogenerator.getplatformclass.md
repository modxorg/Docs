---
title: "xPDOGenerator.getPlatformClass"
_old_id: "1908"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.getplatformclass"
---

## xPDOGenerator::getPlatformClass

Returns the fully-qualified name of the platform class generated for a domain class, for example the `mysql` subclass. The platform class holds the static `$metaMap` for the domain class.

## Syntax

``` php
string getPlatformClass (string $domainClass)
```

## Example

``` php
$generator = $manager->getGenerator();
$platform = $generator->getPlatformClass('MyVendor\\MyPackage\\MyModel');
```

## See Also

- [getClassPlatformTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassplatformtemplate "getClassPlatformTemplate")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")