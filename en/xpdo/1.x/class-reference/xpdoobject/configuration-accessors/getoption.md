---
title: "getOption"
_old_id: "1526"
_old_uri: "1.x/class-reference/xpdoobject/configuration-accessors/getoption"
---

xPDOObject::getOption()
-----------------------

Get an option value for this instance of an xPDOObject.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getOption>

```
<pre class="brush: php">
mixed getOption (string $key)

```Example
-------

```
<pre class="brush: php">
$hydrateFields = $object->getOption(xPDO::OPT_HYDRATE_FIELDS);

```