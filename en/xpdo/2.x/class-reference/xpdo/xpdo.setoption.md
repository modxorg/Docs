---
title: "xPDO.setOption"
_old_id: "1257"
_old_uri: "2.x/class-reference/xpdo/xpdo.setoption"
---

xPDO::setOption 
----------------

Sets an xPDO configuration option value.

Syntax 
-------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#setOption>

```
<pre class="brush: php">
void setOption (string $key, mixed $value)

```Example 
--------

Set the DB caching to false.

```
<pre class="brush: php">
$xpdo->setOption(xPDO::OPT_CACHE_DB,false);

```Remember: setOption changes the option value _only_ for the current request: the values are not persisted.

See Also 
---------

- [xPDO.getOption](/xpdo/2.x/class-reference/xpdo/xpdo.getoption "xPDO.getOption")
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")