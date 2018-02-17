---
title: "Working with Related Objects"
_old_id: "1228"
_old_uri: "2.x/getting-started/using-your-xpdo-model/working-with-related-objects"
---

Related objects in xPDO can be accessed via newQuery, as shown earlier, or through xPDOObject's helper functions, [getOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getone "getOne") and [getMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany") (depending on the relationship.

## Retrieving Objects

First off, let's look at the related object retrieval methods:

### [getOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getone "getOne")

Let's say we have a Car object, that has an Owner related object. Each Car can have only one Owner, which is a table with ID, name, and email. We want to grab the Owner, given that we have the Car object:

```
<pre class="brush: php">
$car = $xpdo->getObject('Car',123);

$owner = $car->getOne('Owner');
echo 'The owner of this car is: '.$owner->get('name');

```[getOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getone "getOne") also takes a $criteria and $cacheFlag parameter, similar to getObject and getCollection. This allows you to do a bit more filtering should you so desire.

### [getMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany")

Now say we have Wheel objects for our Car - obviously there can be more than one Wheel per Car, and we want to grab the whole collection of them. The Wheel object has 'id' and 'position' fields:

```
<pre class="brush: php">
$car = $xpdo->getObject('Car',123);

$wheels = $car->getMany('Wheel');
foreach ($wheels as $wheel) {
   echo 'Got the '.$wheel->get('position').' wheel!<br />';
}

/* This would echo:
Got the Front Left wheel!
Got the Front Right wheel!
Got the Back Left wheel!
Got the Back Right wheel! */

```As you can see, this allows us to quickly and easily grab related objects with ease.

## Adding Related Objects

xPDO also has methods for adding related objects to an existing Object, to make saving easier:

### [addOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addone "addOne")

So we have our Car object, but say we want to set it a new owner that we've just created. We can use [addOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addone "addOne") to easily add it in:

```
<pre class="brush: php">
$car = $xpdo->getObject('Car',123);
$owner = $xpdo->getObject('Owner',array('name' => 'Mark'));
$car->addOne($owner);
$car->save(); 

```Saving the Car object will save the 'owner' field on the Car row to the Owner's ID, via the relationship definition.

You can also do this with new (unsaved) objects; the [save](/xpdo/2.x/class-reference/xpdoobject/persistence-methods/save "save") function will cascade and save both objects. Let's say we have a Car object, but we're adding an entirely new Owner:

```
<pre class="brush: php">
$car = $xpdo->getObject('Car',324);

$owner = $xpdo->newObject('Owner');
$owner->set('name','John');
$owner->set('email','john@doe.com');

$car->addOne($owner);
$car->save();

```This will save both the Car and the Owner object, and relate them together.

Both [addOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addone "addOne") and [addMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addmany "addMany") take a 2nd parameter, called 'alias'. This should be used when an object has more than one relationship with a single class. For example, adding an Owner and Seller relationships, which are both User objects:

```
<pre class="brush: php">
$car->addOne($ownerUser,'Owner');
$car->addOne($sellerUser,'Seller');

```This helps xPDO differentiate between which object belongs to which relationship.

### [addMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addmany "addMany")

Objects with one-to-many relationships can also be batch added via the [addMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addmany "addMany") method. Let's say we want to add all the Wheel objects with width of 10 to our Car:

```
<pre class="brush: php">
$wheels = $xpdo->getCollection('Wheel',array(
   'width' => 10,
));

$car->addMany($wheels);
$car->save();

```This will add all the 10-width Wheels and save the relationships.

## See Also

- [getOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getone "getOne")
- [getMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
- [addOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addone "addOne")
- [addMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/addmany "addMany")
- [Defining Relationships](/xpdo/2.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-relationships "Defining Relationships")