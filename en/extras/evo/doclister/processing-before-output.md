---
title: "Processing before output"
_old_id: "1749"
_old_uri: "evo/doclister/processing-before-output"
---

Results are rarely output without modification. For example, some kind of conditions must be met or processing performed (output a preview of an image, recalculate a price, or format some values).

In MODX the traditional method is to call snippets in output templates, or use modifiers (PHx). Beginners often use this approach thanks to its simplicity, but it increases the load on the parser and the database.

DocLister provides for preliminary processing of data by PHP, using the **prepare** parameter.

Values of the **prepare** parameter can be:

- a snippet name;
- a call to a method in a loaded class;
- an anonymous function.

A number of values can be supplied for a series of processing actions.

Using snippets
--------------

A snippet processes the array `$data` and after processing returns the `$data` array or `false`. In the latter case the data will not be output, i.e. you can use **prepare** to filter data in this way.

You can also use the objects `$_DocLister` and `$_extDocLister` in the snippet.

The `$_DocLister` object gives access to the methods and properties of the controller. For example, you can switch the current output template:

`<pre class="brush: plain">$_DocLister->renderTpl = "@CODE:[+pagetitle+]";`The `getStore` and `setStore` methods are available in the `$_extDocLister` object. `setStore` saves data to memory, and `getStore` retrieves it. As soon as DocLister has completed its work, the saved segments are cleared from the memory.

Using methods in a class

```
<pre class="brush: plain">class DLprepare {
public static function prepare(array $data = array(), DocumentParser $modx, $_DL, prepare_DL_Extender $_extDocLister) {
	return $data}
}
```The value of the parameter in this instance is `DLprepare::prepare`

Anonymous functions may be used in similar fashion.