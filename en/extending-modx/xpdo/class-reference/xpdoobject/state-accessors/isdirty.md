---
title: "isDirty"
_old_id: "1186"
_old_uri: "2.x/class-reference/xpdoobject/state-accessors/isdirty"
---

## xPDOObject::isDirty()

Indicates if an object **field** has been modified (or the object has never been saved). You must pass the field name. There is no overload that checks the whole object.

## Syntax

API Docs: <https://api.modx.com/revolution/2.2/db_core_xpdo_om_xpdoobject.class.html#\xPDOObject::isDirty()>

``` php
boolean isDirty (string $key)
```

- `$key` — field name to check (required).

Returns `true` when the field exists and either appears in the object's dirty map or the object is new (`isNew()`). Returns `false` when the field exists and is unchanged on a persisted object. Unknown field names return `false` and write an error to the xPDO log.

## Examples

Test whether one field on a Skrewt object changed:

``` php
$skrewt = $xpdo->getObject('Skrewt', 1);

echo $skrewt->isDirty('poisonous') ? 1 : 0; // prints 0

$skrewt->set('poisonous', false);

echo $skrewt->isDirty('poisonous') ? 1 : 0; // prints 1
```

### Any dirty fields

xPDO has no `isDirty()` call without `$key`. To see if the object has any pending field changes, inspect the public `$_dirty` map:

``` php
if (!empty($skrewt->_dirty)) {
    echo 'Skrewt has dirty fields.';
} else {
    echo 'Skrewt has no dirty fields.';
}

print_r($skrewt->_dirty);
```

`$_dirty` lists modified field keys. Saving the object clears it. For new objects, `isDirty($key)` is `true` for every known field even before you call `set()`, because `isNew()` is still true.
