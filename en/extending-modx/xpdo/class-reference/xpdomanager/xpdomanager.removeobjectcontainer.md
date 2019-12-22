---
title: "xPDOManager.removeObjectContainer"
_old_id: "1281"
_old_uri: "2.x/class-reference/xpdomanager/xpdomanager.removeobjectcontainer"
---

## xPDOManager::removeObjectContainer()

Drops a table if it exists.

This will only work if there is a corresponding xPDO class for the table and its package has been loaded. MODX will not drop the table if the ORM layer has not defined the table.

## Syntax

API Docs: [removeObjectContainer](http://api.modxcms.com/xpdo/om-mysql/xPDOManager_mysql.html#removeObjectContainer)

``` php
int removeObjectContainer (string $className)
```

## Examples

Drop the table associated with the "Person" object:

``` php
$manager = $xpdo->getManager();
$manager->removeObjectContainer('Person');
```

## Alternatives

If you are trying to remove tables after having removed or renamed the underlying xPDO classes, you may need to resort to issuing a manual "DROP TABLE" query.

``` php
$removed = $modx->exec('DROP TABLE IF EXISTS your_table');
if ($removed === false && $modx->errorCode() !== '' && $modx->errorCode() !== PDO::ERR_NONE) {
    print 'Could not drop table! ERROR: ' . print_r($modx->pdo->errorInfo(),true);
}
else {
    print 'Table dropped successfully.';
}
```
