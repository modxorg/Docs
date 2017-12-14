---
title: "xPDOGenerator.writeSchema"
_old_id: "1277"
_old_uri: "2.x/class-reference/xpdogenerator/xpdogenerator.writeschema"
---

xPDOGenerator::writeSchema
--------------------------

Parses an existing database and generates a XPDO XML schema from it.

Syntax
------

API Docs: [http://api.modxcms.com/xpdo/om-mysql/xPDOGenerator\_mysql.html#writeSchema](http://api.modxcms.com/xpdo/om-mysql/xPDOGenerator_mysql.html#writeSchema)

```
<pre class="brush: php">boolean writeSchema (
  string $schemaFile,
  [string $package = ''],
  [string $baseClass = ''],
  [string $tablePrefix = ''],
  [boolean $restrictPrefix = false])

```Example
-------

Generate the xml schema from an existing database. This also only generates XML for the tables prefixed with 'mydb\_'.

```
<pre class="brush: php">$xpdo= new xPDO('mysql:host=localhost;dbname=myolddatabase','username','password','mydb_');
$manager= $xpdo->getManager();
$generator= $manager->getGenerator();

$xml= $generator->writeSchema('/path/to/my/new/packagename.schema.xml','mypackage', 'xPDOObject','mydb_');

```<div class="note">Note: generating the XML schema doesn't generate the aggregate and composite relationships - just the field and object definitions. You'll need to specify those relationships yourself. See [Defining Relationships](http://rtfm.modx.com/display/xPDO20/Defining+Relationships) for more details. </div>See Also
--------

- [Generating the Model Code](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code "Generating the Model Code")
- [Creating a Model With xPDO](/xpdo/2.x/getting-started/creating-a-model-with-xpdo "Creating a Model With xPDO")
- [xPDOGenerator.parseSchema](/xpdo/2.x/class-reference/xpdogenerator/xpdogenerator.parseschema "xPDOGenerator.parseSchema")