---
title: "xPDO.addPackage"
_old_id: "1578"
_old_uri: "1.x/class-reference/xpdo/xpdo.addpackage"
---

xPDO::addPackage
----------------

Adds a model package and base class path for including classes and/or maps from.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#addPackage>

```
<pre class="brush: php">
void addPackage ([string $pkg = ''], [string $path = ''], [string $tablePrefix = ''])

```Example
-------

Adds package 'mypackage' with a path of '/path/to/mypackage/model' and a table prefix of 'mp\_' to the xPDO runtime model.

```
<pre class="brush: php">
$xpdo->addPackage('mypackage','/path/to/mypackage/model/','mp_');

```See Also
--------

- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")
- [Loading Packages](/xpdo/1.x/getting-started/using-your-xpdo-model/loading-packages "Loading Packages")