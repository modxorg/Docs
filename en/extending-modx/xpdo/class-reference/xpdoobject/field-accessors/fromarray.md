---
title: "fromArray"
_old_id: "1166"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/fromarray"
---

## xPDOObject::fromArray()

Sets object fields from an associative array of key => value pairs.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#fromArray>

``` php
void fromArray(
   array $fldarray,
   [string $keyPrefix = ''],
   [boolean $setPrimaryKeys = false],
   [boolean $rawValues = false],
   [boolean $adhocValues = false]
)
```

## Examples

Input the name of a person from an array.

``` php
$object->fromArray(array(
    'fname' => 'Boo',
    'lname' => 'Radley',
));
echo $object->get('fname').' '.$object->get('lname');
// prints "Boo Radley"
```

Strip 'ghost\_' prefixes from the array provided:

``` php
$object->fromArray(array(
    'ghost_fname' => 'Nearly Headless',
    'ghost_lname' => 'Nick',
),'ghost_');
echo $object->get('fname').' '.$object->get('lname');
// prints "Nearly Headless Nick"
```

Creating a MODX resource:

``` php
$page = $modx->newObject('modResource');

$data = array(
    'pagetitle' => 'My Page',
    'description' => 'Why not?',
    // ... etc...
);

$page->fromArray($data);
$page->save();
```

## See Also

- [fromArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
- [toArray](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/toarray "toArray")
- [fromJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
- [toJSON](extending-modx/xpdo/class-reference/xpdoobject/field-accessors/tojson "toJSON")