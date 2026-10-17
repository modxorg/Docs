---
title: "xPDOGenerator.getClassTemplate"
_old_id: "1905"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.getclasstemplate"
---

## xPDOGenerator::getClassTemplate

Returns the template used to generate a domain class file. The template uses placeholders such as `[+class-header+]`, `[+class-declaration+]`, `[+class-properties+]`, `[+class-methods+]`, and `[+class-close-declaration+]`.

## Syntax

``` php
string getClassTemplate ()
```

## Example

``` php
$generator = $manager->getGenerator();
$template = $generator->getClassTemplate();
```

## See Also

- [getClassPlatformTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getclassplatformtemplate "getClassPlatformTemplate")
- [getMetaTemplate](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.getmetatemplate "getMetaTemplate")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")