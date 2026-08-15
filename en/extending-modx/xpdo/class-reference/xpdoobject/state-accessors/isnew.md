---
title: "isNew"
_old_id: "1188"
_old_uri: "2.x/class-reference/xpdoobject/state-accessors/isnew"
---

## xPDOObject::isNew()

Indicates if the instance is new, and has not yet been persisted.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::isNew()>

``` php
boolean isNew ()
```

## Examples

State if the Broom has been saved.

``` php
$broom = $xpdo->newObject('Broom');
$broom->set('name','Firebolt');

echo $broom->isNew() ? 1 : 0; // prints 1

$broom->save();

echo $broom->isNew() ? 1 : 0; // prints 0
```