---
title: "getFieldName"
_old_id: "1521"
_old_uri: "1.x/class-reference/xpdoobject/metadata-accessors/getfieldname"
---

xPDOObject::getFieldName()
--------------------------

Gets a field name as represented in the database container. This gets the name of the field, fully-qualified by either the object table name or a specified alias, and properly quoted.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#getFieldName>

```
<pre class="brush: php">
string getFieldName (string $k, [string $alias = null])

```Examples
--------

```
<pre class="brush: php">
$document = $xpdo->getObject('Document',1);
echo $document->getFieldName('editedby');
// prints `documents`.`editedby`

```