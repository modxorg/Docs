---
title: "Defining a Schema"
_old_id: "1158"
_old_uri: "2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/"
---

## What is a Schema?

xPDO generates its map and class files, which power the database relationships, from XML schema files. An XML schema is based on a package that defines the name of the schema and allows xPDO to load the schema with its classes dynamically at any time using [xPDO.addPackage](extending-modx/xpdo/class-reference/xpdo/xpdo.addpackage "xPDO.addPackage").

### Schema Version

For xPDO 3.x (used in MODX 3), schemas must use `version="3.0"`. This version enables PSR-4 autoloading and the `metadata.{dbtype}.php` envelope. If you have an older 1.1 schema, see [Upgrading Models to Schema Version 1.1](extending-modx/xpdo/custom-models/defining-a-schema/upgrade-schema-v1.0-to-v1.1 "Upgrading Models to Schema Version 1.1") for information on migrating your index definitions, then update the version to 3.0.

- [Defining the Database and Tables](extending-modx/xpdo/custom-models/defining-a-schema/database-and-tables)
- [Upgrading Models to Schema Version 1.1](extending-modx/xpdo/custom-models/defining-a-schema/upgrade-schema-v1.0-to-v1.1)
- [Defining Relationships](extending-modx/xpdo/custom-models/defining-a-schema/relationships)
- [Validation Rules](extending-modx/xpdo/custom-models/defining-a-schema/validators)
- [More Examples of xPDO XML Schema Files](extending-modx/xpdo/custom-models/defining-a-schema/more-examples)
