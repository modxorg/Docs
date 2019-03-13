---
title: "xPDOManager.createSourceContainer"
_old_id: "1280"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.createsourcecontainer"
---

## xPDOManager::createSourceContainer()

Creates the physical data container represented by a data source.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOManager.html#createSourceContainer>

``` php 
void createSourceContainer (
   $dsn,
   [$username = ''],
   [$password = ''], 
   [$containerOptions = null]
)
```

## Examples

Create a database called 'MyDatabase'.

``` php 
$newDatabaseName = 'MyDatabase';
$dsn = 'mysql:host=localhost;dbname='.$newDatabaseName.';charset=utf8';
$manager = $xpdo->getManager();
$manager->createSourceContainer($dsn,'myusername','mypassword');
```