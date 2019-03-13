---
title: "xPDO.fromJSON"
_old_id: "1237"
_old_uri: "2.x/class-reference/xpdo/xpdo.fromjson"
---

## xPDO::fromJSON

Converts a JSON source string into an equivalent PHP representation.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/xPDO.html#fromJSON>

``` php 
mixed fromJSON (string $src, [boolean $asArray = true])
```

## Example

Convert JSON code to an array:

``` php 
$str = '{name:"John"}';
$ar = $xpdo->fromJSON($str);
print_r($ar); // prints: Array ( 'name' => 'John' )
```

## See Also

- [xPDO.toJSON](xpdo/class-reference/xpdo/xpdo.tojson "xPDO.toJSON")
- [xPDO](xpdo/class-reference/xpdo "xPDO")