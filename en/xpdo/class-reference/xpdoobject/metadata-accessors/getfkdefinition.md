---
title: "getFKDefinition"
_old_id: "1174"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getfkdefinition"
---

## xPDOObject::getFKDefinition()

Get a foreign key definition for a specific classname. This is generally used to lookup classes in a one-to-many relationship with the current object.

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getFKDefinition>

``` php 
array getFKDefinition (string $alias)
```

## Examples

Get the FK definition of a User who just edited the Document.

``` php 
$document = $xpdo->getObject('Document',1);
$fkdef = $document->getFKDefinition('EditedBy');
print_r($fkdef);

/* Outputs:
Array ( 
  [class] => User
  [key] => editedby
  [local] => editedby
  [foreign] => id
  [cardinality] => one
  [owner] => foreign
  [type] => aggregate 
) */
```