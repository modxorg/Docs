---
title: "getFKClass"
_old_id: "1173"
_old_uri: "2.x/class-reference/xpdoobject/metadata-accessors/getfkclass"
---

## xPDOObject::getFKClass()

Get the name of a class related by foreign key to a specified field key. This is generally used to lookup classes involved in one-to-one relationships with the current object.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::getFKClass()>

``` php
void getFKClass (string $k)
```

## Examples

Get the name of the class related to the field 'book' on the object 'myChapter':

``` php
$chapter = $xpdo->getObject('myChapter',12);
echo $chapter->getFKClass('book');
// prints "myBook"
```