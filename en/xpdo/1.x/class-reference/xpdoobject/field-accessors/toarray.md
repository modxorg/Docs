---
title: "toArray"
_old_id: "1564"
_old_uri: "1.x/class-reference/xpdoobject/field-accessors/toarray"
---

xPDOObject::toArray()
---------------------

Copies the object fields and corresponding values to an associative array.

Syntax
------

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#toArray>

```
<pre class="brush: php">
array toArray(
   [string $keyPrefix = ''],
   [boolean $rawValues = false],
   [boolean $excludeLazy = false])
)

```Examples
--------

Get the values of the object in array format:

```
<pre class="brush: php">
$object->set('name','John Lo');
$object->set('email','jlo@gmail.com');
$a = $object->toArray();
print_r($a);
// prints "Array ( [name] => John Lo [email] => jlo@gmail.com )"

```Get the values of the object, but with their keys prefixed with 'dev\_'

```
<pre class="brush: php">
$object->set('name','Mark');
$object->set('version','1.0');
$a = $object->toArray('dev_');
print_r($a);
// prints "Array ( [dev_name] => Mark [dev_version] => 1.0 )"

```