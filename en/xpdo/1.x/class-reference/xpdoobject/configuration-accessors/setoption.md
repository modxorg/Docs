---
title: "setOption"
_old_id: "1557"
_old_uri: "1.x/class-reference/xpdoobject/configuration-accessors/setoption"
---

xPDOObject::setOption()
-----------------------

Sets an option value for this instance of an xPDOObject.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#setOption>

```
<pre class="brush: php">
void setOption(
    string $key,
    mixed $value
)

```Example
-------

```
<pre class="brush: php">
$object->setOption(xPDO::OPT_HYDRATE_FIELDS,true);

```