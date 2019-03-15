---
title: "Properties and Property Sets"
_old_id: "246"
_old_uri: "2.x/making-sites-with-modx/customizing-content/properties-and-property-sets"
---

- [What are Properties?](#what-are-properties)
- [What are Property Sets?](#what-are-property-sets)
- [Assigning Property Sets to Elements](#assigning-property-sets-to-elements)
- [Creating Properties in a Property Set](#creating-properties-in-a-property-set)
- [Importing and Exporting Properties](#importing-and-exporting-properties)
- [Using Properties Programmatically](#using-properties-programmatically)
  - [Using getOption](#using-getoption)
- [Conclusion](#conclusion)



## What are Properties?

Properties are simply values that can be configured for any Element via [Tag Syntax](building-sites/tag-syntax "Tag Syntax"). An example of a Property is the token 'debug' in this Snippet call:

``` php 
[[Quip? &debug=`1`]]
```

'debug' is the Property, where '1' is the Property Value. They are passed to the Element's parser and interpreted there. Snippets and Plugins can access them through the $scriptProperties array, or straight in their key values, as they are extract()'ed.

## What are Property Sets?

Property Sets are user-defined collections of properties for an Element. So instead of having an enormous Snippet call with an unreadable long list of properties, you can store all the properties together as a set:

``` php 
[[MySnippet? &prop1=`a` &prop2=`b` &prop3=`c` &prop4=`d` &prop5=`e` &prop6=`f`]]
... becomes ...
[[MySnippet@myPropertySet]]
```

Property Sets can be attached not only to Snippets, but to _any element_ via that Element's editing page, and a single Property Set can be used by multiple elements. Once a Property Set has been defined and attached to an Element, you can call it by name using the "at" symbol:

``` php 
[[ElementName@PropertySetName]]
```

So, for an example, let's have a Property Set with two properties - 'debug' set to true, and 'user' set to 2. Then let's call it in a snippet.:

``` php 
[[TestSnippet@DebugMode? &user=`1`]]
```

This example would call the snippet "TestSnippet", load the Property Set 'DebugMode', and then would set the value 'user' to 1. Since the property 'user' is defined as 2 in the Property Set, it will be overridden in the call, and end up as 1. The order of property loading is:

> Default Element Properties -> Property Set -> Tag-defined Properties

So, if the default property of 'user' was 0, then it would then be set to 2 by the property set, and then to 1 by the call. The property set can also contain properties not defined in either the default element properties, or in the tag call. This can be useful to load Elements across the site without having to repeat the tag syntax across the site - and make it much easier to manage your tag calls.

Properties will be passed into the Element just as they were in MODx 0.9.6, but they are also passed in via the $scriptProperties array, for those of you wanting more flexibility with knowing what properties are passed in.

## Assigning Property Sets to Elements

Property Sets can only be used on Elements that they are assigned to. This can be done via either the element's properties grid, or Tools -> Property Sets.

From Tools -> Property Sets, right-click on the property set and choose "Attach Element to Property Set". First select the Class Name of the element, then select the element itself. You can attach multiple elements to the same Property Set.

For example, here's an image of a property set named 'TestPropertySet' in a snippet's editing page:

![](/download/attachments/18678075/prop-grid1.png?version=1&modificationDate=1268853879000)

As you can see here, there is a property set loaded with some properties. Properties in green are default properties that have been overridden in the property set. Properties that are purple are properties that do not exist in the Element's default properties, but are defined in the Property Set. Properties can also have descriptions, as shown by the + icon to the left. When clicked, the description will appear below.

To add a property set to an Element, you'll simply click the "Add Property Set" toolbar item in the top right of the grid. It will show a window like this:

![](/download/attachments/18678075/propset-add1.png?version=1&modificationDate=1268853882000)

From there, you can select the property set you want to add. If you'd like to create a completely new Property Set and automatically attach it to this element, you can do so by checking the "Create New Property Set" checkbox, and these fields will show:

![](/download/attachments/18678075/propset-new1.png?version=1&modificationDate=1268853886000)

Then once you save your new Property Set, it will be automatically attached to that Element.

## Creating Properties in a Property Set

To create a Property in a Property Set, you'll simply need to just load the Property Set you want to work on, and then click "Create Property". That will load this window:

![](/download/attachments/18678075/prop-create1.png?version=1&modificationDate=1268853875000)

From there, you can create a property and associated options. Note here that we are creating a property of type "List", which is a dropdown property. You can add options to that property from the grid. Once you save the property, it will be added to the property set.

## Importing and Exporting Properties

You can also import and export properties using the grid. Simply click on the corresponding buttons at the bottom.

When you import properties, it will overwrite your properties in the grid currently. Make sure that you want to do this before importing!

## Using Properties Programmatically

Properties are available in a snippet via the $scriptProperties array:

``` php 
$prop = $scriptProperties['propertyName'];
```

Note that if a parameter is sent in the snippet call that has the same name as a property in a property set, the parameter value will override the default value in the property set.

### Using getOption

You can also get a snippet property with $modx->getOption() like this:

``` php 
$modx->getOption('propertyName', $scriptProperties, 'default');
```

## Conclusion