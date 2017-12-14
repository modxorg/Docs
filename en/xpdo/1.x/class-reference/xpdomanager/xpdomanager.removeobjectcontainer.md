---
title: "xPDOManager.removeObjectContainer"
_old_id: "1622"
_old_uri: "1.x/class-reference/xpdomanager/xpdomanager.removeobjectcontainer"
---

xPDOManager::removeObjectContainer()
------------------------------------

Drops a table, if it exists.

Syntax
------

API Docs: [http://api.modxcms.com/xpdo/om-mysql/xPDOManager\_mysql.html#removeObjectContainer](http://api.modxcms.com/xpdo/om-mysql/xPDOManager_mysql.html#removeObjectContainer)

```
<pre class="brush: php">
int removeObjectContainer (string $className)

```Examples
--------

Drop the table associated with the "Person" object:

```
<pre class="brush: php">
$manager = $xpdo->getManager();
$manager->removeObjectContainer('Person');

```