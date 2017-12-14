---
title: "xPDOGenerator.parseSchema"
_old_id: "1617"
_old_uri: "1.x/class-reference/xpdogenerator/xpdogenerator.parseschema"
---

xPDOGenerator::parseSchema
--------------------------

Parses an XPDO XML schema and generates classes and map files from it.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOGenerator.html#parseSchema>

```
<pre class="brush: php">
boolean parseSchema (string $schemaFile, [string $outputDir = ''], [boolean $compile = false])

```Example
-------

Generate the map and class files for an XML schema:

```
<pre class="brush: php">
$manager = $xpdo->getManager();
$generator = $manager->getGenerator();
$generator->parseSchema('mypackage.mysql.schema.xml','/path/to/mypackage/model/');

```See Also
--------

- [Generating the Model Code](/xpdo/1.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code "Generating the Model Code")
- [Creating a Model With xPDO](/xpdo/1.x/getting-started/creating-a-model-with-xpdo "Creating a Model With xPDO")
- [xPDOGenerator.writeSchema](/xpdo/1.x/class-reference/xpdogenerator/xpdogenerator.writeschema "xPDOGenerator.writeSchema")