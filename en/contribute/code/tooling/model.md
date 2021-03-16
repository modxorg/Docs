---
title: Building model/schema
---

Changes to the core model (adding/changing/removing database fields or tables), need to be applied to the XML schema files in `core/model/schema/`. 

Once changes are made in the schema, they need to build to the model files for xPDO to use.

## Preparation

If you haven't already, make sure you've copied `_build/build.properties.sample.php` to `_build/build.properties.php`. No changes to the file are necessary.

## Building

Use Composer to run the build script for all schema files and build the model files:

``` bash
composer run-script parse-schema
```

or 

``` bash
php composer.phar run-script parse-schema
```
