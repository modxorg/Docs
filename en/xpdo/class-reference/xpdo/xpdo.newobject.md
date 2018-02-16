---
title: "xPDO.newObject"
_old_id: "1251"
_old_uri: "2.x/class-reference/xpdo/xpdo.newobject"
---

xPDO::newObject 
----------------

Creates a new instance of a specified class.   
All new objects created with this method are transient until [xPDOObject::save()](/xpdo/2.x/class-reference/xpdoobject/persistence-methods/save "save") is called the first time and is reflected by the xPDOObject::$\_new property.

Syntax 
-------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#newObject>

```
<pre class="brush: php">
object|null newObject (string $className, [array $fields = array ()])

```Example 
--------

Create a new Box object:

```
<pre class="brush: php">
$box = $xpdo->newObject('Box');

```Create a new Box object with the width and height already set:

```
<pre class="brush: php">
$box = $xpdo->newObject('Box',array(
   'width' => 10,
   'height' => 4,
));

```See Also 
---------

- [Creating Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/creating-objects "Creating Objects")
- [Removing (deleting) objects](/xpdo/2.x/class-reference/xpdoobject/persistence-methods/remove)
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")