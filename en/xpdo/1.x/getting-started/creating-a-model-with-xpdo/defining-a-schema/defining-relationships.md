---
title: "Defining Relationships"
_old_id: "1509"
_old_uri: "1.x/getting-started/creating-a-model-with-xpdo/defining-a-schema/defining-relationships"
---

We're going to need to define some relationships between our tables so xPDO can communicate properly between them. xPDO deals with two types of relationships, **aggregate** and **composite**.

Aggregate Relationships
-----------------------

An aggregate relationship in xPDO is relationship between two tables where the secondary table is an aggregate of the primary table in such a way that if the primary table is deleted, the secondary table should still exist.

A great example of this is a collection of Crayons in a Box. The relationship from the Crayons to the Box is an **aggregate** relationship, and would be defined in our XML schema like such:

```
<pre class="brush: xml">
<object class="myCrayon" table="crayons" extends="xPDOSimpleObject">
   <aggregate alias="Box" class="myBox" local="box" foreign="id" 
cardinality="one" owner="foreign" />
</object>

```Note the attributes:

- **alias** - Relationships in xPDO allow for 'aliases', which can differentiate between two different relationships that refer to the same foreign key.
- **class** - The class name of the relating object.
- **local** - The local key by which we get the ID of the foreign, related object. In our example, this tells us the ID of the Box.
- **foreign** - The foreign key by which this object relates. In our example, it is the ID field of the Box object.
- **cardinality** - The cardinality of the relationship. Usually, in aggregates, this is "one", since there is only one Box by which this Crayon could be referring to. In the opposite relationship between the Box to the Crayon (a Composite relationship), the Box could be pointing to many Crayons - so then the value would be "many", not "one".
- **owner** - The owner of the foreign key that relates the objects.

So our XML here would allow us to use the following code to grab the Box for a Crayon:

```
<pre class="brush: php">
$crayon = $xpdo->getObject('Crayon',1);
$box = $crayon->getOne('Box');
echo $box->get('name');

```Composite Relationships
-----------------------

A composite relationship in xPDO is relationship between two tables where the secondary table(s) are composites of the primary table in such a way that if the primary table is deleted, the secondary table(s) should be removed.

Back to our Crayon-Box example: The Crayons are Composites of the Box object. We'd define that in our XML schema as:

```
<pre class="brush: xml">
<object class="myBox" table="boxes" extends="xPDOSimpleObject">
   <composite alias="Crayons" class="myCrayon" local="id" foreign="box" 
cardinality="many" owner="local" />
</object>

```As you can see, a few attributes have changed. The alias now is plural, since we could have any number of Crayons related to this Box. Also, the local attribute now points to the ID of this Box; the foreign attribute points to the foreign key 'box' in the Crayon object; the cardinality is now "many"; and finally, the owner of the key is now "local", since it is owned by the Box.

We can grab all the Crayons in the Box with this xPDO code:

```
<pre class="brush: php">
$box = $xpdo->getObject('Box',23);
$crayons = $box->getMany('Crayons');
foreach ($crayons as $crayon) {
   echo $crayon->get('color').'<br />';
}

```Remember that in a Composite relationship, should the owner of the relationship be removed, all the Composites will be removed. So, if we remove the Box object:

```
<pre class="brush: php">
$box->remove();

```...this would remove all of the related Crayons for that Box. This can be useful to cascade removal of objects, making code simpler and easier to manage.

Relating Many-to-Many
---------------------

Let's go back to our StoreFinder model. First off, let's review our schema so far:

```
<pre class="brush: xml">
<?xml version="1.0" encoding="UTF-8"?>
<model package="storefinder" baseClass="xPDOObject" platform="mysql" defaultEngine="MyISAM" phpdoc-package="storefinder" phpdoc-subpackage="model">
  <object class="sfStore" table="sfinder_stores" extends="xPDOSimpleObject">
        <field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
        <field key="address" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
        <field key="city" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
        <field key="state" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
        <field key="zip" dbtype="varchar" precision="10" phptype="string" null="false" default="0" index="index" />
        <field key="country" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
        <field key="phone" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
        <field key="fax" dbtype="varchar" precision="20" phptype="string" null="false" default="" />
        <field key="active" dbtype="int" precision="1" attributes="unsigned" phptype="integer" null="false" default="0" />
  </object>
  <object class="sfOwner" table="sfinder_owners" extends="xPDOSimpleObject">
    <field key="name" dbtype="varchar" precision="100" phptype="string" null="false" default="" index="index" />
    <field key="email" dbtype="varchar" precision="255" phptype="string" null="false" default="" />
  </object>
  
  <object class="sfStoreOwner" table="sfinder_store_owners" extends="xPDOSimpleObject">
    <field key="store" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" index="index" />
    <field key="owner" dbtype="int" precision="10" attributes="unsigned" phptype="integer" null="false" default="0" index="index" />
  </object>
</model>

```We're going to want to relate Stores to Owners, but as you can see here, the relationship is "many-to-many" - an Owner can have multiple Stores, and a Store can have multiple Owners. So how do we handle this? Well, the best way is to create an intermediary table, which we'll call 'sfStoreOwner'. This table has only 3 fields - it's ID, and 2 indexed fields that are 'store' and 'owner'.

Those two fields contain the PK values of the Store and Owner it is relating. So let's add the relationships. In our sfStore definition, we want to add this line:

```
<pre class="brush: xml">
<composite alias="StoreOwners" class="sfStoreOwner" local="id" foreign="store" 
cardinality="many" owner="local" />

```And in our sfOwner definition, let's add this:

```
<pre class="brush: xml">
<composite alias="StoreOwners" class="sfStoreOwner" local="id" foreign="owner" 
cardinality="many" owner="local" />

```Note that both of our primary classes use a Composite relationship. This is because if any of our Stores or Owners get deleted, we want to delete any connecting relationships between them.

So go to our sfStoreOwner definition, and add these two lines:

```
<pre class="brush: xml">
<aggregate alias="Store" class="sfStore" local="store" foreign="id" 
cardinality="one" owner="foreign" />
<aggregate alias="Owner" class="sfOwner" local="owner" foreign="id" 
cardinality="one" owner="foreign" />

```Now that we've got our model defined, in our xPDO code we'll be able to do something like this:

```
<pre class="brush: php">
$store = $xpdo->getObject('sfStore',43);
$storeOwners = $store->getMany('StoreOwners');
$owners = array();
foreach ($storeOwners as $storeOwner) {
    $owners[] = $storeOwner->getOne('Owner');
}
foreach ($owners as $owner) {
   echo $owner->get('name').'<br />';
}

```And that will output a list of owners for that store.

However, as you can see, that code isn't very optimized. So we're going to optimize it a bit using $xpdo->newQuery:

```
<pre class="brush: php">
$c = $xpdo->newQuery('sfOwner');
$c->innerJoin('sfStoreOwner','StoreOwners');
$c->where(array(
   'StoreOwners.store' => 43, // the ID of our Store
));
$owners = $xpdo->getCollection('sfOwner',$c);

foreach ($owners as $owner) {
   echo $owner->get('name').'<br />';
}

```This block of code lets us grab all the owners of a store with only one query.

See Also
--------

- [getOne](/xpdo/1.x/class-reference/xpdoobject/related-object-accessors/getone "getOne")
- [getMany](/xpdo/1.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany")
- [addOne](/xpdo/1.x/class-reference/xpdoobject/related-object-accessors/addone "addOne")
- [addMany](/xpdo/1.x/class-reference/xpdoobject/related-object-accessors/addmany "addMany")
- [Retrieving Objects](/xpdo/1.x/getting-started/using-your-xpdo-model/retrieving-objects "Retrieving Objects")