---
title: "Defining a Schema"
_old_id: "1158"
_old_uri: "2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/"
---

## What is a Schema?

xPDO generates its map and class files, which power the database relationships, from XML schema files. An XML schema is based on a package that defines the name of the schema and allows xPDO to load the schema with its classes dynamically at any time using [xPDO.addPackage](xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage").

**Schema Version**
Please note that the default schema version changed in xPDO 2.0.0-rc3 to version 1.1. If you created your model in releases before 2.0.0-rc3, and you want to use the new index elements for describing your indexes, you can migrate to the new schema format by using the upgrade tool included with xPDO. See [Upgrading Models to Schema Version 1.1](xpdo/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-the-database-and-tables/upgrading-models-to-schema-version-1.1 "Upgrading Models to Schema Version 1.1") for more information.

1. [Defining the Database and Tables](xpdo/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-the-database-and-tables)
  1. [Upgrading Models to Schema Version 1.1](xpdo/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-the-database-and-tables/upgrading-models-to-schema-version-1.1)
2. [Defining Relationships](xpdo/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-relationships)
3. [More Examples of xPDO XML Schema Files](xpdo/getting-started/creating-a-model-with-xpdo/defining-a-schema/more-examples-of-xpdo-xml-schema-files)