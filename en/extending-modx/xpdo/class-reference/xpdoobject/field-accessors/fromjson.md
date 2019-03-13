---
title: "fromJSON"
_old_id: "1167"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/fromjson"
---

## xPDOObject::fromJSON()

Sets the object fields from a JSON object string.

## Syntax

API Docs: [https://api.modx.com/revolution/2.2/db\_core\_xpdo\_om\_xpdoobject.class.html](https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html)

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

- [fromArray](xpdo/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
- [toArray](xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray")
- [fromJSON](xpdo/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
- [toJSON](xpdo/class-reference/xpdoobject/field-accessors/tojson "toJSON")