---
title: "Hydrating Fields"
_old_id: "1184"
_old_uri: "2.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor/hydrating-fields"
---

- [What is hydration?](#HydratingFields-Whatishydration%3F)
- [Hydrating Fields](#HydratingFields-HydratingFields)
- [Hydrating Ad Hoc Fields](#HydratingFields-HydratingAdHocFields)
- [Hydrating Related Objects](#HydratingFields-HydratingRelatedObjects)
- [See Also](#HydratingFields-SeeAlso)



## What is hydration?

Hydration is the process in which fields and related objects represented by an xPDOObject are populated with values. By default, these fields are **only** accessible using the get(), getOne() and getMany() methods of xPDOObject, and must be defined with appropriate metadata in the map for the object. However, there are a number of options you can use to extend how xPDO hydrates fields and related objects.

The options are available by passing any of the following configuration options into the `$config` parameter of the [xPDO constructor](/xpdo/2.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor"):

- **xPDO::OPT\_HYDRATE\_FIELDS** - If true, fields will be hydrated as public member variables of the object.
- **xPDO::OPT\_HYDRATE\_RELATED\_OBJECTS** - If true, related objects will be hydrated as public member variables of the object.
- **xPDO::OPT\_HYDRATE\_ADHOC\_FIELDS** - If true, ad-hoc fields will be allowed and hydrated on the object (respects xPDO::OPT\_HYDRATE\_FIELDS setting as well).

## Hydrating Fields

If the xPDO::OPT\_HYDRATE\_FIELDS option is set to true, in addition to accessing fields via the xPDOObject::get() method, all object fields will be made accessible for reading directly as public member variables of the object. An example of this is such:

```
<pre class="brush: php">
$object->set('name',$name);
echo $object->name;

```This would output the 'name' field of the object, assuming that the 'name' field is defined in the object's schema.

**These are "raw" values**
Please note that accessing fields of the object directly provides only the "raw" value as loaded from the database, ignoring the metadata that is defined for the field, and avoiding any logic applied by the get() method of your xPDOObject class (or any of it's parent classes). It is recommended that you always use the get() method to access object fields unless you need the raw value or to avoid the get() logic for a specific reason.

## Hydrating Ad Hoc Fields

If the xPDO::OPT\_HYDRATE\_ADHOC\_FIELDS option is set to true, field hydration will be enabled for arbitrary fields not defined in the class map. It takes one step further the idea of hydrating fields, and now hydrates all _ad hoc_ fields; or rather, any field that is not defined in the schema. Say we want to set an arbitrary field called 'puns' to a Person object:

```
<pre class="brush: php">
$object->set('name','Arthur Dent');
$object->set('puns',42);
echo $object->get('name') .' has '. $object->get('puns') . ' puns.';

```This would echo the appropriate value, even if the field 'puns' isn't defined in the schema.

The option respects the xPDO::OPT\_HYDRATE\_FIELDS option with respect to making the _ad hoc_ fields available directly as public member variables of the object.

## Hydrating Related Objects

If the xPDO::OPT\_HYDRATE\_RELATED\_OBJECTS option is set to true, all related objects will be made available as public member variables of the object. By default, related objects are only accessible via the [getOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getone "getOne") or [getMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany") methods of xPDOObject, but this option (similar to xPDO::OPT\_HYDRATE\_FIELDS) makes any related objects already loaded by those methods accessible directly as variables. Example:

```
<pre class="brush: php">
$fordPrefect->getMany('Beers');
foreach ($fordPrefect->Beers as $beer) {
   echo $beer->get('name').'<br />';
}

```This would echo a list of all the Beers associated to the $fordPrefect object loaded by the [getMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany") method.

**One vs. Many**
Objects loaded with [getOne](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getone "getOne") are available directly as an object of that class, while those with [getMany](/xpdo/2.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany") are available as an array of objects of the class.

## See Also

- [The xPDO Constructor](/xpdo/2.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor")
- [Setting Object Fields](/xpdo/2.x/getting-started/using-your-xpdo-model/setting-object-fields "Setting Object Fields")
- [Working with Related Objects](/xpdo/2.x/getting-started/using-your-xpdo-model/working-with-related-objects "Working with Related Objects")