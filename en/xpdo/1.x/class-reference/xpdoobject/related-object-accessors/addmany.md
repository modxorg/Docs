---
title: "addMany"
_old_id: "1494"
_old_uri: "1.x/class-reference/xpdoobject/related-object-accessors/addmany"
---

xPDOObject::addMany()
---------------------

Adds an object or collection of objects related to this class.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#addMany>

```
<pre class="brush: php">
boolean addMany (
   mixed &$obj,
   [string $alias = '']
)

```Example
-------

Add golf clubs to a bag and save.

```
<pre class="brush: php">
$bag = $xpdo->newObject('GolfBag');
$bag->set('name',"Chris's Bag");
$bag->set('color','blue');

$clubs = array();
for ($i=1;$i<10;$i++) {
   $club = $xpdo->newObject('GolfClub');
   $club->set('name',$i.' Iron');
   $clubs[] = $club;
}
$bag->addMany($clubs);

$bag->save(); // saves both the bag and all the clubs

```See Also
--------

- [Working with Related Objects](/xpdo/1.x/getting-started/using-your-xpdo-model/working-with-related-objects "Working with Related Objects")