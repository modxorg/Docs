---
title: "xPDO.getOption"
_old_id: "1589"
_old_uri: "1.x/class-reference/xpdo/xpdo.getoption"
---

xPDO::getOption
---------------

Get an xPDO configuration option value by key.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#getOption>

```
<pre class="brush: php">
mixed getOption (string $key, [array $options = null], [mixed $default = null])

```Examples
--------

Get the table prefix:

```
<pre class="brush: php">
$tablePrefix = $xpdo->getOption(xPDO_OPT_TABLE_PREFIX);

```Get an option from a user-specified array, and if not set, check for it in $xpdo->config. If it's not set there, return false as its default value:

```
<pre class="brush: php">
$mySetting = $xpdo->getOption('my_setting',$myConfig,false);

```See Also
--------

- [xPDO.setOption](/xpdo/1.x/class-reference/xpdo/xpdo.setoption "xPDO.setOption")
- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")