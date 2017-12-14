---
title: "save"
_old_id: "1555"
_old_uri: "1.x/class-reference/xpdoobject/persistence-methods/save"
---

xPDOObject::save()
------------------

Persist new or changed objects to the database container. Will also cascade and save any objects that have been added to it via related object addition methods (addOne, addMany).

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#save>

```
<pre class="brush: php">
boolean save ([boolean|integer $cacheFlag = null])

```Examples
--------

Save a wand, along with its owner and parts.

```
<pre class="brush: php">
$owner = $xpdo->newObject('Wizard');
$owner->set('name','Harry Potter');

$parts = array();
$parts[1] = $xpdo->newObject('WandPart');
$parts[1]->set('name','Phoenix Feather');
$parts[2] = $xpdo->newObject('WandPart');
$parts[2]->set('name','Holly Branch');

$wand = $xpdo->newObject('Wand');
$wand->addOne($owner);
$wand->addMany($parts);

if ($wand->save() == false) {
   echo 'Oh no, the wand failed to save!';
}

```