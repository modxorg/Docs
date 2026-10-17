---
title: "xPDO.fromJSON"
description: "Converts a JSON source string into an equivalent PHP representation."
_old_id: "1237"
_old_uri: "2.x/class-reference/xpdo/xpdo.fromjson"
---

## xPDO::fromJSON

Converts a JSON source string into an equivalent PHP representation.

## Syntax

``` php
mixed fromJSON (string $src, [boolean $asArray = true])
```

## Example

Convert JSON code to an array:

``` php
$str = '{"name":"John"}';
$ar = $xpdo->fromJSON($str);
print_r($ar); // prints: Array ( 'name' => 'John' )
```

## See Also

- [xPDO.toJSON](extending-modx/xpdo/class-reference/xpdo/xpdo.tojson "xPDO.toJSON")
- [xPDO](extending-modx/xpdo "xPDO")
