---
title: "fromJSON"
_old_id: "1167"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/fromjson"
---

## xPDOObject::fromJSON()

Sets the object fields from a JSON object string.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#fromJSON>

``` php 
void fromJSON (
   string $jsonSource,
   [string $keyPrefix = ''],
   [boolean $setPrimaryKeys = false],
   [boolean $rawValues = false],
   [boolean $adhocValues = false]
)
```

## Example

``` php 
$str = '{"name":"Sirius","email":"Black"}';
$object->fromJSON($str);
echo $object->get('name').' '.$object->get('email');
// prints "Sirius Black"
```

## See Also

- [fromArray](/xpdo/2.x/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
- [toArray](/xpdo/2.x/class-reference/xpdoobject/field-accessors/toarray "toArray")
- [fromJSON](/xpdo/2.x/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
- [toJSON](/xpdo/2.x/class-reference/xpdoobject/field-accessors/tojson "toJSON")