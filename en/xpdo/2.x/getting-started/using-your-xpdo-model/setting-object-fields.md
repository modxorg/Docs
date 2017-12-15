---
title: "Setting Object Fields"
_old_id: "1211"
_old_uri: "2.x/getting-started/using-your-xpdo-model/setting-object-fields"
---

Once you've got an Object, you can change the values of the record by setting fields.

Setting the fields only changes the values in the object, and holds them temporarily in memory until you save the object permanently to the database.

Setting can be done multiple ways.

### set

The primary way is via the set method:

```
<pre class="brush: php">$myBox->set('width',10);
$myBox->set('height',4);

```set() also takes a 3rd $vType parameter, which is either a string indicating the format of provided value, or a callable function that should be used to set the field value, overriding the default behavior. For example:

```
<pre class="brush: php">/* Set date as an unix timestamp integer rather than a string date */
$myBox->set('birthday',432432543,'integer');

/* Set dimension of box based on width and height via custom function */
function setDim($k,$v,&$obj) {
   $w = $obj->get('width');
   $h = $obj->get('height');
   $dim = $w * $h;
   $obj->set($k,$dim);
}
$myBox->set('dimension','','setDim');

```### fromArray

Another way Objects can be set in xPDO is through the fromArray() method:

```
<pre class="brush: php">$myBox->fromArray(array(
   'width' => 5,
   'height' => 10,
));

```xPDOObject::fromArray takes 5 parameters in total. We've seen the first in use. The second is $keyPrefix, which when set, will strip the passed value from the array you are passing in the first parameter. A good example of this is when passing $\_POST vars to an Object:

```
<pre class="brush: php">// Let us say that:
// $_POST = array(
//    'test_w' => 12,
//    'test_h' => 13,
// );
$myBox->fromArray($_POST,'test_');

echo $myBox->get('w'); // prints '12'

```The third parameter, $setPrimaryKeys, is a boolean value that defaults to false. When set, it will allow Primary Keys in the object to be set. This is useful for creating new objects that you want to specify the ID of:

```
<pre class="brush: php">$myBox = $xpdo->newObject('Box');
$myBox->fromArray(array(
   'id' => 23,
   'width' => 5,
   'height' => 5,
),'',true);

echo $myBox->get('id'); // prints '23'

```The fourth parameter, $rawValues, is set to false by default. If true, the object will set its values without calling set() internally. What does this mean? Well, it means field type validation wont happen; nor will that field be set as 'dirty'.

The fifth parameter, $adhocValues, when true, will automatically set any passed values as object vars, regardless of whether or not they are actually fields in the object. For example:

```
<pre class="brush: php">$myBox->fromArray(array(
  'width' 5',
  'notRealField' => 'boo',
),'',false,false,true);

```<div class="note">The last field can be overridden by passing xPDO::OPT\_HYDRATE\_ADHOC\_FIELDS as 'true' into the xPDO config. If that setting is true, the 5th parameter will always be true.</div>### save

This function allows you to save your set fields permanently to the database.

```
<pre class="brush: php">$myBox->save();

```This will immediately execute the UPDATE (or CREATE) query that will save the record to the database.