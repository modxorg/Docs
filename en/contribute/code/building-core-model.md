---
title: Building the core model
---

If you're working on the core model and need to re-generate the model based on the core schema, you can use the following commands.

### For MySQL

Building `modx.mysql.schema.xml`:

````
core/vendor/bin/xpdo parse-schema --config=core/model/schema/config.php --psr4=MODX\\ --update=1 mysql core/model/schema/modx.mysql.schema.xml core/src/
````


### For sqlsrv

Building `modx.sqlsrv.schema.xml`:

````
core/vendor/bin/xpdo parse-schema --config=core/model/schema/config.php --psr4=MODX\\ --update=1 sqlsrv core/model/schema/modx.sqlsrv.schema.xml core/src/
````
