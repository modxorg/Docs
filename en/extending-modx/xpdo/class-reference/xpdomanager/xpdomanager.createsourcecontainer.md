---
title: "xPDOManager.createSourceContainer"
description: "Creates the physical data container represented by a data source."
_old_id: "1280"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.createsourcecontainer"
---

## xPDOManager::createSourceContainer()

Creates the physical data container represented by a data source.

## Syntax

``` php
boolean createSourceContainer (
   $dsnArray = null,
   [$username = null],
   [$password = null],
   [$containerOptions = array()]
)
```

## Examples

Create a database called 'MyDatabase'.

``` php
$newDatabaseName = 'MyDatabase';
$dsn = 'mysql:host=localhost;dbname='.$newDatabaseName.';charset=utf8';
$manager = $xpdo->getManager();
$manager->createSourceContainer(xPDO::parseDSN($dsn),'myusername','mypassword');
```
