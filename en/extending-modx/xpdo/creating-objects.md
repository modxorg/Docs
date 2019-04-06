---
title: "Creating Objects"
_old_id: "1156"
_old_uri: "2.x/getting-started/using-your-xpdo-model/creating-objects"
---

## What is an Object?

An "Object" in xPDO is simply an abstract, class-based representation of a row in a table in a database. In other words, a row in the table 'cars' would have an xPDO model definition of the 'cars' table, and then you would grab Collections of Objects of each car.

xPDO defines these Objects using the xPDOObject class.

## Creating an Object

Creating objects in xPDO utilizes the "newObject" xPDO method.

Let's say we have an object defined in our model of class "Box". We want to create a new object of it:

``` php
$myBox = $xpdo->newObject('Box');
```

It's that simple. We can also create the Box object with some pre-filled field values:

``` php
$myBox = $xpdo->newObject('Box',array(
   'width' => 5,
   'height' => 12,
   'color' => 'red',
));
```

You cannot set primary key values when using the second parameter of newObject(). Set the primary key values using fromArray() after creating the instance with the newObject() and make sure you set the parameter setPrimaryKeys equal to true.

This will give us an xPDOObject-based Box object that can be [manipulated and saved](extending-modx/xpdo/setting-object-fields "Setting Object Fields"). Note that this Object is not yet persistent until you save it using [xPDOObject.save](extending-modx/xpdo/class-reference/xpdoobject/persistence-methods/save "save").

In versions prior to xPDO 2.1.1-pl, if your SQL table does not exist for the object you've created, and the object class has a defined table for that class, xPDO will automatically create the table in the database for you. In 2.1.1-pl and later versions, you must set xPDO::OPT\_AUTO\_CREATE\_TABLES to true to have tables created automatically. It is recommended that you create the tables for your model explicitly in a setup script rather than depending on the auto table creation features that were not optional in earlier releases of xPDO. See [xPDOManager.createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer "xPDOManager.createObjectContainer") for information on explicitly creating tables from the model.

 
**See Also**

- [xPDO.newObject](extending-modx/xpdo/class-reference/xpdo/xpdo.newobject "xPDO.newObject")
- [xPDOManager.createObjectContainer](extending-modx/xpdo/class-reference/xpdomanager/xpdomanager.createobjectcontainer "xPDOManager.createObjectContainer")