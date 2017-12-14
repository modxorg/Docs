---
title: "xPDOManager.createSourceContainer"
_old_id: "1621"
_old_uri: "1.x/class-reference/xpdomanager/xpdomanager.createsourcecontainer"
---

xPDOManager::createSourceContainer()
------------------------------------

Creates the physical data container represented by a data source.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOManager.html#createSourceContainer>

```
<pre class="brush: php">
void createSourceContainer (
   $dsn,
   [$username = ''],
   [$password = ''], 
   [$containerOptions = null]
)

```Examples
--------

Create a database called 'MyDatabase'.

```
<pre class="brush: php">
$newDatabaseName = 'MyDatabase';
$dsn = 'mysql:host=localhost;dbname='.$newDatabaseName.';charset=utf8';
$manager = $xpdo->getManager();
$manager->createSourceContainer($dsn,'myusername','mypassword');

```