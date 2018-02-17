---
title: "xPDO.toJSON"
_old_id: "1258"
_old_uri: "2.x/class-reference/xpdo/xpdo.tojson"
---

## xPDO::toJSON

Converts a PHP array into a JSON encoded string.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#toJSON>

```
<pre class="brush: php">
string toJSON (array $array)

```## Example

```
<pre class="brush: php">
$ar = array('name' => 'John');
$str = $xpdo->toJSON($ar);
echo $str; // prints: {name:"John"}

```## See Also

- [xPDO.fromJSON](/xpdo/2.x/class-reference/xpdo/xpdo.fromjson "xPDO.fromJSON")
- [xPDO](/xpdo/2.x/class-reference/xpdo "xPDO")