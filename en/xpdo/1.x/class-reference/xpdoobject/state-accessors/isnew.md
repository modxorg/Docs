---
title: "isNew"
_old_id: "1536"
_old_uri: "1.x/class-reference/xpdoobject/state-accessors/isnew"
---

xPDOObject::isNew()
-------------------

Indicates if the instance is new, and has not yet been persisted.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#isNew>

```
<pre class="brush: php">
boolean isNew ()

```Examples
--------

State if the Broom has been saved.

```
<pre class="brush: php">
$broom = $xpdo->newObject('Broom');
$broom->set('name','Firebolt');

echo $broom->isNew() ? 1 : 0; // prints 1

$broom->save();

echo $broom->isNew() ? 1 : 0; // prints 0

```