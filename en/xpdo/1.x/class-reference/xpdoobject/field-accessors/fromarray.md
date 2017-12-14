---
title: "fromArray"
_old_id: "1516"
_old_uri: "1.x/class-reference/xpdoobject/field-accessors/fromarray"
---

xPDOObject::fromArray()
-----------------------

Sets object fields from an associative array of key => value pairs.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#fromArray>

```
<pre class="brush: php">
void fromArray(
   array $fldarray,
   [string $keyPrefix = ''],
   [boolean $setPrimaryKeys = false],
   [boolean $rawValues = false],
   [boolean $adhocValues = false]
)

```Examples
--------

Input the name of a person from an array.

```
<pre class="brush: php">
$object->fromArray(array(
    'fname' => 'Boo',
    'lname' => 'Ridley',
));
echo $object->get('fname').' '.$object->get('lname');
// prints "Boo Ridley"

```Strip 'ghost\_' prefixes from the array provided:

```
<pre class="brush: php">
$object->fromArray(array(
    'ghost_fname' => 'Nearly Headless',
    'ghost_lname' => 'Nick',
),'ghost_');
echo $object->get('fname').' '.$object->get('lname');
// prints "Nearly Headless Nick"

```