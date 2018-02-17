---
title: "Removing Objects"
_old_id: "1206"
_old_uri: "2.x/getting-started/using-your-xpdo-model/removing-objects"
---

When you 'remove' an Object in xPDO, you delete its row from the database. xPDO abstracts this out into a [remove](/xpdo/2.x/class-reference/xpdoobject/persistence-methods/remove "remove") function, seen here:

```
<pre class="brush: php">
$box = $xpdo->getObject('Box',134);

if ($box->remove() == false) {
   echo 'An error occurred while trying to remove the box!';
}

```The remove function will return either true or false, depending on the outcome of the deletion. Errors will also be logged via $xpdo->log.

This will also remove any composite related objects to this object. For example, if our Box had 4 "side" related objects that were mapped out as composites, they would be removed as well when $box->remove is called.

## See Also

- [xPDOObject::remove](/xpdo/2.x/class-reference/xpdoobject/persistence-methods/remove "remove")