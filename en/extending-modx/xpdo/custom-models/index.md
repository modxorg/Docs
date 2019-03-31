---
title: "Custom Models"
---

To work with custom models, you will need to [define a schema](extending-modx/xpdo/custom-models/defining-a-schema) and [generate the model](extending-modx/xpdo/custom-models/generating-the-model) first. 

## What is a Model?

Broadly speaking, the model layer in any MVC framework refers to data (often from the database) and the code that interacts with it. MODx uses xPDO as an object-relational map, which represents the database data in code form.

A model is simply a representation of a database in code form. xPDO uses XML schema files to define database tables as XML objects. This is a similar approach used by other MVC frameworks, e.g. Symphony, which uses YAML files to define models.

After a model has been defined in XML, the XML is parsed and builds out "maps" and class files. The maps are PHP arrays that are parsed at runtime to tell xPDO information about the tables. The classes are actual PHP classes by which each instance represents a row in the specified table.
