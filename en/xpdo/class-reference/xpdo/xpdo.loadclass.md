---
title: "xPDO.loadClass"
_old_id: "1249"
_old_uri: "2.x/class-reference/xpdo/xpdo.loadclass"
---

## xPDO::loadClass

Include a class by fully qualified name. This is a handy way to perform an `include_once` operation to include a `.class.php` file. If the file is not found, `false` is returned and a warning is logged. This only includes the class: it does not instantiate an instance of it.

## Syntax

API Docs: <http://api.modx.com/xpdo/xPDO.html#loadClass>

```
<pre class="brush: php">
string|boolean loadClass (string $fqn, [ $path = ''], [ $ignorePkg = false], [ $transient = false])

```The $fqn (fully qualified name) should in the format:

> dir\_a.dir\_b.dir\_c.classname

which will translate to:

> XPDO\_CORE\_PATH/om/dir\_a/dir\_b/dir\_c/dbtype/classname.class.php

**Hint**
- The file name you are including must include **.class.php** as its extension.
- The path to your model must end in a trailing slash!



## Example

Load a class from the path '/my/path/to/model/'.

```
<pre class="brush: php">
$xpdo->loadClass('myBox','/my/path/to/model/');

```Another example:

```
<pre class="brush: php">
if (!$xpdo->loadClass('myBox','/my/path/to/model/',true,true)) {
    die('Could not load class myBox!');
}
$Box = new myBox();

```## See Also

- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")
- [modX.getService](developing-in-modx/other-development-resources/class-reference/modx/modx.getservice "modX.getService") - this will include a class and instantiate it.