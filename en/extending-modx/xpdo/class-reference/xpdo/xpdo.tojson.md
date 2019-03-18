---
title: "xPDO.toJSON"
_old_id: "1258"
_old_uri: "2.x/class-reference/xpdo/xpdo.tojson"
---

## xPDO::toJSON

Converts a PHP array into a JSON encoded string.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#toJSON>

``` php 
string toJSON (array $array)
```

## Example

``` php 
$ar = array('name' => 'John');
$str = $xpdo->toJSON($ar);
echo $str; // prints: {name:"John"}
```

## See Also

- [xPDO.fromJSON](extending-modx/xpdo/class-reference/xpdo/xpdo.fromjson "xPDO.fromJSON")
- [xPDO](extending-modx/xpdo/class-reference/xpdo "xPDO")