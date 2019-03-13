---
title: "getFieldName"
_old_id: "1172"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getfieldname"
---

## xPDOObject::getFieldName()

Gets a field name as represented in the database container. This gets the name of the field, fully-qualified by either the object table name or a specified alias, and properly quoted.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getFieldName>

``` php 
string getFieldName (string $k, [string $alias = null])
```

## Examples

``` php 
$document = $xpdo->getObject('Document',1);
echo $document->getFieldName('editedby');
// prints `documents`.`editedby`
```