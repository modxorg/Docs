---
title: "xPDOGenerator.getIndex"
_old_id: "1910"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.getindex"
---

## xPDOGenerator::getIndex

Returns the index definition for a parsed schema, used by the generator when reverse-engineering or emitting index metadata.

## Syntax

``` php
array|null getIndex (mixed $index)
```

## Example

``` php
$generator = $manager->getGenerator();
$index = $generator->getIndex($indexName);
```

## See Also

- [writeSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.writeschema "writeSchema")
- [xPDOGenerator](extending-modx/xpdo/class-reference/xpdogenerator "xPDOGenerator")