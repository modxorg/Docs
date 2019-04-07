---
title: "toArray"
_old_id: "1217"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/toarray"
---

## xPDOObject::toArray() 

Copies the object fields and corresponding values to an associative array.

## Syntax 

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#toArray>

``` php
array toArray(
   [string $keyPrefix = ''],
   [boolean $rawValues = false],
   [boolean $excludeLazy = false],
   [boolean|integer|string|array $inludeRelated = false])
)
```

**keyPrefix:** an optional prefix to prepend to each fields' keys.

**rawValues**: optional flag to get the raw value (true) or to use xPDOObject->get(). Typically will want to use ->get().

**excludeLazy**: An option flag indicating if you want to exclude lazy fields from the resulting array; the default behavior is to include them which means the object will query the database for the lazy fields before providing the value.

**includeRelated**: Describes if and how to include loaded related object fields. 
\* As an integer all loaded related objects in the graph up to that level of depth will be included. 
\* As a string, only loaded related objects matching the JSON graph representation will be included. 
\* As an array, only loaded related objects matching the graph array will be included. 
\* As boolean true, all currently loaded related objects will be included.

## Examples 

Get the values of the object in array format:

``` php
$object->set('name','John Lo');
$object->set('email','jlo@gmail.com');
$a = $object->toArray();
print_r($a);
// prints "Array ( [name] => John Lo [email] => jlo@gmail.com )"
```

Get the values of the object, but with their keys prefixed with 'dev\_'

``` php
$object->set('name','Mark');
$object->set('version','1.0');
$a = $object->toArray('dev_');
print_r($a);
// prints "Array ( [dev_name] => Mark [dev_version] => 1.0 )"
```

## See Also 

- [fromArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
- [toArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray")
- [fromJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
- [toJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/tojson "toJSON")