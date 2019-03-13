---
title: "getPKType"
_old_id: "1179"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getpktype"
---

## xPDOObject::getPKType()

Gets the type of the primary key field for the object.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getPKType>

``` php 
string getPKType()
```

## Examples

Grabs the PK type of a table of Resources, which have an auto\_increment ID field:

``` php 
$resource = $xpdo->getObject('Resource',1);
echo $resource->getPKType();
// prints "integer"
```