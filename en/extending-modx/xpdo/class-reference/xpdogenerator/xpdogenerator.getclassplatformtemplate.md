---
title: "xPDOGenerator.getClassPlatformTemplate"
_old_id: "1906"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.getclassplatformtemplate"
---

## xPDOGenerator::getClassPlatformTemplate

Returns the template used to generate a platform class file (for example, the `mysql` subclass of a domain class). The generated platform class carries the static `$metaMap` property.

## Syntax

``` php
string getClassPlatformTemplate ()
```

## Example

``` php
$generator = $manager->getGenerator();
$template = $generator->getClassPlatformTemplate();
```

## See Also

- [getClassTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclasstemplate "getClassTemplate")
- [getPlatformClass](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getplatformclass "getPlatformClass")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")