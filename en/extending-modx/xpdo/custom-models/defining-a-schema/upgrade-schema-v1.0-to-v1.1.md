---
title: "Upgrading to schema v1.1"
_old_id: "1220"
_old_uri: "2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-the-database-and-tables/upgrading-models-to-schema-version-1.1"
---

## Upgrading Models from Schema Version 1.0 to 1.1

In xPDO 2.0.0-rc3, a new schema element for describing table indexes was added to the `object` element of the xPDO schema. To maintain backwards compatibility in the runtime code with older schemas, where the indexes were described using the _index_ and _index\_group_ attributes of the `field` elements, schemas created with this new element must be differentiated from the older schemas. As a result, the _version_ attribute was added to the `model` element with a value of 1.1. All legacy models without the version element are assumed to be version 1.0.

To make conversion of existing mysql models easier, a tool is provided in xPDO that can be executed from the command line or a browser.

### xpdo/tools/schema/upgrade-mysql-1.1.php

This simple tool takes a few arguments and automatically converts your 1.0 model's index definitions to the 1.1 format and adds version="1.1" to the `model` element.

- Required Arguments
    - **pkg** — The name of the model package being converted.
    - **pkg\_path** — The root path of the model package.
    - **schema\_name** — The xPDO schema filename to convert.
    - **schema\_path** — The path to the schema file.
- Optional Arguments
    - **backup\_path** — The path to write the backup schema file. If not specified, the backup is written to the same directory (schema\_path).
    - **backup\_prefix** — A string to prepend to the backup schema file. Default is '~'.
    - **dsn** — A valid PDO DSN connection string.
    - **dbuser** — A valid database user with access to the specified DSN.
    - **dbpass** — The password for the specified dbuser.
    - **regen** — If true, will regenerate the model after the schema is updated.
    - **write** — If true, will write the updated schema to file and backup the original.
    - **echo** — If true, will echo the updated schema to STDOUT.
    - **debug** — Sets the debug level of xPDO; if true, **echo** is automatically set true.
    - **include** — An external properties file to include arguments from.
    - **error\_reporting** — Set the PHP error\_reporting level for the script. Default is -1 (does not report errors).
    - **display\_errors** — Set the PHP display\_errors setting. Default is true.

#### Argument Rules

- At least one of the four arguments, **echo**, **write**, **regen**, or **debug**, must be set.
- The **write** argument cannot be used when the **debug** argument is true.
- **regen** can only be used when **write** is set or the schema is already at version 1.1.

### Usage

**realpath() used on path arguments**
All values for \_path arguments (and the include argument) are passed through realpath().

#### Running as CLI script

CLI arguments for the script are specified in the format:

``` php
--argument[=value]
```

**boolean arguments**
If the equal sign and value are not provided, the argument value is set to boolean true.

Here is an example CLI usage:

``` php
user@hostname:/home/user/xpdo$ php xpdo/tools/schema/upgrade-mysql-1.1.php --pkg=sample --pkg_path=models/ --schema_name=sample.mysql.schema.xml --schema_path=schemas/ --echo --write --regen
```

Alternatively, you can use the include argument to set properties from an external file.

An example properties file, `sample.schema.properties.php`:

``` php
<?php
$pkg='sample';
$pkg_path='models/';
$schema_name='sample.mysql.schema.xml';
$schema_path='schemas/';
$echo=true;
$write=true;
$regen=true;
```

And the example CLI call to use the properties file:

``` php
user@hostname:/home/user/xpdo$ php xpdo/tools/schema/upgrade-mysql-1.1.php --include=sample.schema.properties.php
```

**CLI arguments override properties file**
Please note that any arguments provided in the CLI call will override values set in and included from the properties file.

#### Running as web request

You can also execute the script as a web request, passing the arguments as $\_REQUEST variables, $\_GET, $\_POST, or $\_COOKIE. An example URL for such a call might look like this:

``` php
http://localhost/food/xpdo/tools/schema/upgrade-mysql-1.1.php?pkg=sample&pkg_path=models/&schema_name=sample.mysql.schema.xml&schema_path=schemas/&echo=true&write=true&regen=true
```

**boolean arguments**
To set a boolean value of true, make sure you pass the string 'true', otherwise the value is assumed to be boolean false.
