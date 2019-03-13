---
title: "getPK"
_old_id: "1178"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getpk"
---

## xPDOObject::getPK()

Gets the name (or names) of the primary key field(s) for the object.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getPK>

``` php 
mixed getPK ()
```

## Example

Get the PK of a Person object, who's PK field is 'id'.

``` php 
$person = $xpdo->getObject('Person',1);
$pk = $person->getPK();
echo $pk;
// prints "id"
```