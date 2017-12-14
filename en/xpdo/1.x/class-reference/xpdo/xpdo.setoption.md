---
title: "xPDO.setOption"
_old_id: "1598"
_old_uri: "1.x/class-reference/xpdo/xpdo.setoption"
---

xPDO::setOption
---------------

Sets an xPDO configuration option value.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#setOption>

```
<pre class="brush: php">
void setOption (string $key, mixed $value)

```Example
-------

Set the DB caching to false.

```
<pre class="brush: php">
$xpdo->setOption(xPDO_OPT_CACHE_DB,false);

```See Also
--------

- [xPDO.getOption](/xpdo/1.x/class-reference/xpdo/xpdo.getoption "xPDO.getOption")
- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")