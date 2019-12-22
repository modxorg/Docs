---
title: "Removing Objects"
_old_id: "1206"
_old_uri: "2.x/getting-started/using-your-xpdo-model/removing-objects"
---

## xPDOObject.remove()

When you 'remove' an Object in xPDO, you delete its row from the database. xPDO abstracts this out into a [remove](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/remove "remove") function, seen here:

``` php
$box = $xpdo->getObject('Box',134);

if ($box->remove() == false) {
   echo 'An error occurred while trying to remove the box!';
}
```

The remove function will return either true or false, depending on the outcome of the deletion. Errors will also be logged via $xpdo->log.

This will also remove any **composite related objects** to this object. For example, if our Box had 4 "side" related objects that were mapped out as composites, they would be removed as well when $box->remove is called.

## xPDO.removeCollection($class, $criteria)

This method is used to delete multiple objects.

<http://api.modxcms.com/xpdo/xPDO.html#removeCollection>

## Examples

From modSessionHandler:

``` php
public function gc($max) {
    $max = (integer) $this->modx->getOption('session_gc_maxlifetime',null,$max);
    $maxtime= time() - $max;
    $result = $this->modx->removeCollection('modSession', array("`access` < {$maxtime}"));
    return $result;
}
```

**Warning**
Careful! If you do not specify your criteria correctly, you can wipe out an entire database table!

### Both parameters required

Note that the both parameters (object type and the array of selectors) are required. If you want to delete everything in a table, pass 'array()' as the second parameter and this will match and delete all items.

For example, to delete all objects of type 'objectName' from the database, do the following.

``` php
$modx->removeCollection('objectName', array());
```

### Does not remove composites

When using `removeCollection()`, composite related objects are not automatically removed, unlike the remove() function.
