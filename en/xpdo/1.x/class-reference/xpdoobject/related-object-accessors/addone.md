---
title: "addOne"
_old_id: "1495"
_old_uri: "1.x/class-reference/xpdoobject/related-object-accessors/addone"
---

xPDOObject::addOne()
--------------------

Adds an object related to this instance by a foreign key relationship.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#addOne>

```
<pre class="brush: php">
boolean addOne (
   mixed &$obj,
   [string $alias = '']
)

```Example
-------

Add a Rank to a newly-created Person, then save both through cascading.

```
<pre class="brush: php">
$person = $xpdo->newObject('Person',1);
$person->set('fname','Johnny');
$person->set('lname','Benjamins');

$rank = $xpdo->newObject('Rank');
$rank->set('title','CEO');
$rank->set('level',1);
$person->addOne($rank);

$person->save(); // will save both person and rank

```See Also
--------

- [Working with Related Objects](/xpdo/1.x/getting-started/using-your-xpdo-model/working-with-related-objects "Working with Related Objects")