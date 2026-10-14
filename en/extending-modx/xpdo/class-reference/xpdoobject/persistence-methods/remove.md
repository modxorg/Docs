---
title: "remove"
description: "Remove the persistent instance of an object permanently."
_old_id: "1203"
_old_uri: "2.x/class-reference/xpdoobject/persistence-methods/remove"
---

## xPDOObject::remove()

Remove the persistent instance of an object permanently. This deletes rows from the database.

## Syntax

``` php
boolean remove ([array $ancestors = array ()])
```

## Examples

Get rid of an item.

``` php
$item = $xpdo->getObject('Item',123);

if ($item->remove() == false) echo 'The Item failed to remove.';
```

## See Also

- [Removing Objects](extending-modx/xpdo/removing-objects)
