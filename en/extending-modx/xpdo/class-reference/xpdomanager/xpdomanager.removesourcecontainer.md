---
title: "xPDOManager.removeSourceContainer"
description: "Drops a physical data container, if it exists."
_old_id: "1282"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.removesourcecontainer"
---

## xPDOManager::removeSourceContainer()

Drops a physical data container, if it exists.

## Syntax

``` php
int removeSourceContainer (string $dsn, string $username, string $password)
```

## Examples

Drop a database called 'MyDatabase'.

``` php
$newDatabaseName = 'MyDatabase';
$dsn = 'mysql:host=localhost;dbname='.$newDatabaseName.';charset=utf8';
$manager = $xpdo->getManager();
$manager->removeSourceContainer($dsn,'myusername','mypassword');
```
