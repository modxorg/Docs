---
title: "xPDO.fromJSON"
_old_id: "1582"
_old_uri: "1.x/class-reference/xpdo/xpdo.fromjson"
---

xPDO::fromJSON
--------------

Converts a JSON source string into an equivalent PHP representation.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#fromJSON>

```
<pre class="brush: php">
mixed fromJSON (string $src, [boolean $asArray = true])

```Example
-------

Convert JSON code to an array:

```
<pre class="brush: php">
$str = '{name:"John"}';
$ar = $xpdo->fromJSON($str);
print_r($ar); // prints: Array ( 'name' => 'John' )

```See Also
--------

- [xPDO.toJSON](/xpdo/1.x/class-reference/xpdo/xpdo.tojson "xPDO.toJSON")
- [xPDO](/xpdo/1.x/class-reference/xpdo "xPDO")