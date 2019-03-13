---
title: "isDirty"
_old_id: "1186"
_old_uri: "2.x/class-reference/xpdoobject/state-accessors/isdirty"
---

## xPDOObject::isDirty()

Indicates if an object field has been modified (or never saved).

## Syntax

API Docs: <http://api.modxcms.com/xpdo/om/xPDOObject.html#isDirty>

``` php 
boolean isDirty (string $key)
```

## Examples

Test if a Skrewt object has been modified.

``` php 
$skrewt = $xpdo->getObject('Skrewt',1);

echo $skrewt->isDirty() ? 1 : 0; // prints 0

$skrewt->set('poisonous',false);

echo $skrewt->isDirty() ? 1 : 0; // prints 1
```