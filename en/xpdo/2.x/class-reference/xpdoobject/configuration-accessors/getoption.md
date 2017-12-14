---
title: "getOption"
_old_id: "1177"
_old_uri: "2.x/class-reference/xpdoobject/configuration-accessors/getoption"
---

xPDOObject::getOption()
-----------------------

Get an option value for this instance of an xPDOObject, using xPDO options if no instance specific option exists.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getOption>

```
<pre class="brush: php">
mixed getOption (string $key [, array|null $options [, mixed $default [, boolean $skipEmpty]]] )

```- $key: the key of the setting or option to load.
- $options: the source of the setting or option. Either null (which attempts to find the key in the main configuration) or an array of options.
- $default: the value to return when the key was not found.
- $skipEmpty: when set to true, the $default will also be returned if the $key's value is an empty string. **_Added in xPDO 2.2.1 / MODX 2.2.0-rc2_**.

Examples
--------

### Simple Option Retrieval

Gets the config setting for xPDO::OPT\_HYDRATE\_FIELDS.

```
<pre class="brush: php">
$hydrateFields = $xpdo->getOption(xPDO::OPT_HYDRATE_FIELDS);

```Gets the config option for 'test', and if not set, returns '123'.

```
<pre class="brush: php">
$test = $xpdo->getOption('test',null,'123');

```Checks the $props array for the key 'depth', and if doesn't exist, then checks $xpdo->config, and if still doesn't exist, then sets to 10.

```
<pre class="brush: php">
$props = array();
$depth = $xpdo->getOption('depth',$props,10);
echo $depth; // prints 10

$xpdo->setOption('depth',20);
$depth = $xpdo->getOption('depth',$props,10);
echo $depth; // prints 20

$props['depth'] = 30;
$depth = $xpdo->getOption('depth',$props,10);
echo $depth; // prints 30

```