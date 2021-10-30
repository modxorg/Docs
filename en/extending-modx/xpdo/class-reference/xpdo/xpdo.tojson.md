---
title: "xPDO.toJSON"
_old_id: "1258"
_old_uri: "2.x/class-reference/xpdo/xpdo.tojson"
---

## xPDO::toJSON

Converts a PHP array into a JSON encoded string.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_xpdo.class.html#\xPDO::toJSON()>

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
- [xPDO](extending-modx/xpdo "xPDO")
