---
title: "Creating Objects"
_old_id: "1506"
_old_uri: "1.x/getting-started/using-your-xpdo-model/creating-objects"
---

Creating objects in xPDO utilizes the [newObject](/xpdo/2.x/class-reference/xpdo/xpdo.newobject "xPDO.newObject") xPDO method.

Let's say we have an object defined in our model of class "Box". We want to create a new object of it:

```
<pre class="brush: php">
$myBox = $xpdo->newObject('Box');

```It's that simple. We can also create the Box object with some pre-filled field values:

```
<pre class="brush: php">
$myBox = $xpdo->newObject('Box',array(
   'width' => 5,
   'height' => 12,
   'color' => 'red',
));

```This will give us an xPDOObject-based Box object that can be manipulated and saved.

<div class="note">If your SQL table does not exist for the object you've created, and the object class has a defined table for that class, xPDO will automatically create the table in the database for you.</div>See Also
--------

- [xPDO.newObject](/xpdo/1.x/class-reference/xpdo/xpdo.newobject "xPDO.newObject")