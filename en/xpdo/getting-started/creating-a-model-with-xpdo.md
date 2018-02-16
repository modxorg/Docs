---
title: "Creating a Model With xPDO"
_old_id: "1155"
_old_uri: "2.x/getting-started/creating-a-model-with-xpdo"
---

Creating custom models to use xPDO with database tables is a pretty simple task in xPDO.

What is a Model?
----------------

<div class="info">**About MVC**  
Broadly speaking, the model layer in any MVC framework refers to data (often from the database) and the code that interacts with it. MODx uses xPDO as an object-relational map, which represents the database data in code form.</div>A model is simply a representation of a database in code form. xPDO uses XML schema files to define database tables as XML objects. This is a similar approach used by other MVC frameworks, e.g. Symphony, which uses YAML files to define models.

After a model has been defined in XML, the XML is parsed and builds out "maps" and class files. The maps are PHP arrays that are parsed at runtime to tell xPDO information about the tables. The classes are actual PHP classes by which each instance represents a row in the specified table.

1. [Defining a Schema](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema)
  1. [Defining the Database and Tables](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-the-database-and-tables)
      1. [Upgrading Models to Schema Version 1.1](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-the-database-and-tables/upgrading-models-to-schema-version-1.1)
  2. [Defining Relationships](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-relationships)
  3. [More Examples of xPDO XML Schema Files](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files)
2. [Generating the Model Code](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code)
  1. [Domain Classes](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code/domain-classes)
  2. [Table Classes](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code/table-classes)
  3. [O-R Maps](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/generating-the-model-code/o-r-maps)

See Also
--------

- [xPDOManager](/xpdo/2.x/class-reference/xpdomanager "xPDOManager")
- [xPDOGenerator](/xpdo/2.x/class-reference/xpdogenerator "xPDOGenerator")