---
title: "fromArray"
_old_id: "1166"
_old_uri: "2.x/class-reference/xpdoobject/field-accessors/fromarray"
---

## xPDOObject::fromArray()

Sets object fields from an associative array of key => value pairs.

## Syntax

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

```## Examples

Input the name of a person from an array.

```
<pre class="brush: php">
$object->fromArray(array(
    'fname' => 'Boo',
    'lname' => 'Radley',
));
echo $object->get('fname').' '.$object->get('lname');
// prints "Boo Radley"

```Strip 'ghost\_' prefixes from the array provided:

```
<pre class="brush: php">
$object->fromArray(array(
    'ghost_fname' => 'Nearly Headless',
    'ghost_lname' => 'Nick',
),'ghost_');
echo $object->get('fname').' '.$object->get('lname');
// prints "Nearly Headless Nick"

```Creating a MODX resource:

```
<pre class="brush: php">
$page = $modx->newObject('modResource');

$data = array(
    'pagetitle' => 'My Page',
    'description' => 'Why not?',
    // ... etc...
);

$page->fromArray($data);
$page->save();

```## See Also

- [fromArray](/xpdo/2.x/class-reference/xpdoobject/field-accessors/fromarray "fromArray")
- [toArray](/xpdo/2.x/class-reference/xpdoobject/field-accessors/toarray "toArray")
- [fromJSON](/xpdo/2.x/class-reference/xpdoobject/field-accessors/fromjson "fromJSON")
- [toJSON](/xpdo/2.x/class-reference/xpdoobject/field-accessors/tojson "toJSON")