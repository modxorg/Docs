---
title: "xPDOGenerator.parseSchema"
_old_id: "1276"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.parseschema"
---

## xPDOGenerator::parseSchema

Parses an XPDO XML schema and generates classes and map files from it.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOGenerator.html#parseSchema>

``` php
boolean parseSchema (string $schemaFile, [string $outputDir = ''], [boolean $compile = false])
```

## Example

Generate the map and class files for an XML schema:

``` php
$manager = $xpdo->getManager();
$generator = $manager->getGenerator();
$generator->parseSchema('mypackage.mysql.schema.xml','/path/to/mypackage/model/');
```

## See Also

- [Generating the Model Code](extending-modx/xpdo/custom-models/generating-the-model "Generating the Model Code")
- [Creating a Model With xPDO](extending-modx/xpdo/custom-models/defining-a-schema "Creating a Model With xPDO")
- [xPDOGenerator.writeSchema](extending-modx/xpdo/class-reference/xpdogenerator/xpdogenerator.writeschema "xPDOGenerator.writeSchema")