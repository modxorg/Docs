---
title: "Hydrating Fields"
_old_id: "1532"
_old_uri: "1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor/hydrating-fields"
---

<div>- [What is hydration?](#HydratingFields-Whatishydration%3F)
- [Hydrating Fields](#HydratingFields-HydratingFields)
- [Hydrating Ad Hoc Fields](#HydratingFields-HydratingAdHocFields)
- [Hydrating Related Objects](#HydratingFields-HydratingRelatedObjects)
- [See Also](#HydratingFields-SeeAlso)

</div>What is hydration?
------------------

Hydration is the process by which fields on objects are directly accessible for reading as public variables on the object itself.

In xPDO, this option is available by passing either of the following configuration options into the $config parameter (2nd) in the [xPDO constructor](/xpdo/1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor"):

- **XPDO\_OPT\_HYDRATE\_FIELDS** - If true, fields will be hydrated.
- **XPDO\_OPT\_HYDRATE\_RELATED\_OBJECTS** - If true, related objects will be hydrated.
- **XPDO\_OPT\_HYDRATE\_ADHOC\_FIELDS** - If true, ad-hoc fields will be hydrated.

Hydrating Fields
----------------

If the XPDO\_OPT\_HYDRATE\_FIELDS option is set to true, this ability will be available. This makes all object fields accessible for reading directly on the object. An example of this is such:

```
<pre class="brush: php">
$object->set('name',$name);
echo $object->name;

```This would output the 'name' field of the object, assuming that the 'name' field is defined in the object's schema.

Hydrating Ad Hoc Fields
-----------------------

If the XPDO\_OPT\_HYDRATE\_ADHOC\_FIELDS option is set to true, this ability will be available. It takes one step further the idea of hydrating fields, and now hydrates all _ad hoc_ fields; or rather, any field that is not defined in the schema. Say we want to set an arbitrary field called 'puns' to a Person object:

```
<pre class="brush: php">
$object->set('name','Arthur Dent');
$object->set('puns',42);
echo $object->name.' has '.$object->puns.' puns.';

```This would echo the appropriate value, even if the field 'puns' isn't defined in the schema.

Hydrating Related Objects
-------------------------

if the XPDO\_OPT\_HYDRATE\_RELATED\_OBJECTS option is set to true, this ability will be available. This hydrates all related objects to public vars when [getOne](/xpdo/1.x/class-reference/xpdoobject/related-object-accessors/getone "getOne") or [getMany](/xpdo/1.x/class-reference/xpdoobject/related-object-accessors/getmany "getMany") is used. Example:

```
<pre class="brush: php">
$fordPrefect->getMany('Beers');
foreach ($fordPrefect->Beers as $beer) {
   echo $beer->get('name').'<br />';
}

```This would echo a list of all the Beers associated to the $fordPrefect object.

See Also
--------

- [The xPDO Constructor](/xpdo/1.x/getting-started/fundamentals/xpdo,-the-class/the-xpdo-constructor "The xPDO Constructor")