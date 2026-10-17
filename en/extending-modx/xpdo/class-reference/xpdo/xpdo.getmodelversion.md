---
title: "xPDO.getModelVersion"
description: "Get the schema version a class was generated from."
_old_id: "1836"
_old_uri: "2.x/class-reference/xpdo/xpdo.getmodelversion"
---

## xPDO::getModelVersion

Returns the `version` string of the schema the class was generated from, for example `'3.0'`. Returns `'1.0'` when no version is recorded for the class.

## Syntax

``` php
string getModelVersion (string $className)
```

## Example

``` php
$version = $xpdo->getModelVersion('MODX\\Revolution\\modResource');
// '3.0'
```

## See Also

- [Defining the Database and Tables](extending-modx/xpdo/custom-models/defining-a-schema/database-and-tables "Defining the Database and Tables")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")