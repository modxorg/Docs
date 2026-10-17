---
title: "xPDOGenerator.getMetaTemplate"
_old_id: "1907"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.getmetatemplate"
---

## xPDOGenerator::getMetaTemplate

Returns the template used to generate the legacy `xpdo_meta_map` array for older schema versions.

## Syntax

``` php
string getMetaTemplate ()
```

## Example

``` php
$generator = $manager->getGenerator();
$template = $generator->getMetaTemplate();
```

## See Also

- [outputMeta](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.outputmeta "outputMeta")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")