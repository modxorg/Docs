---
title: "remove"
_old_id: "1551"
_old_uri: "1.x/class-reference/xpdoobject/persistence-methods/remove"
---

xPDOObject::remove()
--------------------

Remove the persistent instance of an object permanently.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#remove>

```
<pre class="brush: php">
boolean remove ([array $ancestors = array ()])

```Examples
--------

Get rid of an item.

```
<pre class="brush: php">
$item = $xpdo->getObject('Item',123);

if ($item->remove() == false) echo 'The Item failed to remove.';

```