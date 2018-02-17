---
title: "INHERIT Binding"
_old_id: "163"
_old_uri: "2.x/making-sites-with-modx/customizing-content/template-variables/bindings/inherit-binding"
---

## What is the @INHERIT Binding?

The @INHERIT binding will automatically find the corresponding value of the parent Resource and use that as its value. If the parent Resource also has @INHERIT, it will look at that parent's parent's value, and so forth. If it ends up at the root and no value has been specified, the value will be 0.

For example, if you define a Template Variable to use a default value of "@INHERIT", then when you create a child resource under a parent, the value of the TV in the child will reflect the value stored in the parent resource.

The devil is in the details here: if the value of a child TV has not been overridden (i.e. the inherited value is preserved), then MODX follows parsimonious storage rules, and **no row will be created inside the modx\_site\_tmplvar\_contentvalues table**. If you are accessing values via the API, then using the **getTVValue()** method on a page object, it will traverse up the hierarchy to find the value from the parent resource.

```
<pre class="brush: php">
$pages = $modx->getCollection('modResource');
foreach ($pages as $p) {
    print $p->getTVValue('my_inheritance');
}

```**Be Careful**
A value is not always written to the database when you are using @INHERIT.

Note that this is a dynamic lookup that occurs whenever the child page is saved and its value is empty. If you later edit the values in the parent, these will be reflected in the child. You can break the inheritance by supplying your own value in the child. You may also restore the inheritance by deleting the value and leaving the field empty.

## Usage

This gets used when you define a Template Variable. You paste the following into the TV's "Default Value" field:

```
<pre class="brush: php">
@INHERIT

```## See Also

- [Template Variables](making-sites-with-modx/customizing-content/template-variables "Template Variables")
- [Bindings](making-sites-with-modx/customizing-content/template-variables/bindings "Bindings")