---
title: "xPDOGenerator.compile"
_old_id: "1909"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.compile"
---

## xPDOGenerator::compile

Compiles the generated classes into a cached form. In xPDO 3.x the MySQL implementation of this method is a stub that always returns `false`, so the `compile` option of `parseSchema()` and the CLI `--compile` flag have no effect for MySQL.

## Syntax

``` php
boolean compile ([string $path = ''])
```

## Example

``` php
$generator = $manager->getGenerator();
$generator->compile($outputDir);
```

## See Also

- [parseSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.parseschema "parseSchema")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")