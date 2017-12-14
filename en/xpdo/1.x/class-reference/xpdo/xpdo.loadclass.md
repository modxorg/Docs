---
title: "xPDO.loadClass"
_old_id: "1591"
_old_uri: "1.x/class-reference/xpdo/xpdo.loadclass"
---

xPDO::loadClass
---------------

Load a class by fully qualified name.

The $fqn should in the format:

> dir\_a.dir\_b.dir\_c.classname

which will translate to:

> XPDO\_CORE\_PATH/om/dir\_a/dir\_b/dir\_c/dbtype/classname.class.php

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#loadClass>

```
<pre class="brush: php">
string|boolean loadClass (string $fqn, [ $path = ''], [ $ignorePkg = false], [ $transient = false])

```Example
-------

Load a class from the path '/my/path/to/model/'.

```
<pre class="brush: php">
$xpdo->loadClass('myBox','/my/path/to/model/');

```See Also
--------

- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")