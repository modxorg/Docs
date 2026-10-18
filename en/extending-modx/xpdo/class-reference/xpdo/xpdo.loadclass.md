---
title: "xPDO.loadClass"
description: "Include a class by fully qualified name."
_old_id: "1249"
_old_uri: "2.x/class-reference/xpdo/xpdo.loadclass"
---

## **⚠️ DEPRECATED** – `xPDO::loadClass`

**Note:** `loadClass()` has been **deprecated since xPDO 3.0**. Use Composer autoloading or `addPackage()` with PSR‑4 instead.

## xPDO::loadClass

Include a class by fully qualified name. This is a handy way to perform an `include_once` operation to include a `.class.php` file. If the file is not found, `false` is returned and a warning is logged. This only includes the class: it does not instantiate an instance of it.

**Note:** `loadClass()` is deprecated since xPDO 3.0. Use Composer autoloading or `addPackage()` with PSR-4 instead.

## Syntax

``` php
string|boolean loadClass (string $fqn, [ $path = ''], [ $ignorePkg = false], [ $transient = false])
```

The $fqn (fully qualified name) should in the format:

> dir\_a.dir\_b.dir\_c.classname

which will translate to:

> XPDO\_CORE\_PATH/Om/dir\_a/dir\_b/dir\_c/classname.class.php

### Hint

- The file name you are including must include **.class.php** as its extension (legacy 2.x format).
- The path to your model must end in a trailing slash!

## Example

Load a class from the path '/my/path/to/model/'.

``` php
$xpdo->loadClass('myBox','/my/path/to/model/');
```

Another example:

``` php
if (!$xpdo->loadClass('myBox','/my/path/to/model/',true,true)) {
    die('Could not load class myBox!');
}
$Box = new myBox();
```

## See Also

- [xPDO](extending-modx/xpdo "xPDO")
- [modX.getService](extending-modx/modx-class/reference/modx.getservice "modX.getService") - this will include a class and instantiate it.
