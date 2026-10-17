---
title: "setDirty"
_old_id: "1871"
_old_uri: "2.x/class-reference/xpdoobject/state-accessors/setdirty"
---

## xPDOObject::setDirty

Marks a field of the object as dirty (changed). The field is added to the object's dirty map, and its validation flag is reset. Called with no arguments, it marks every field of the object dirty.

Returns nothing. An unknown field name is resolved through [getField()](extending-modx/xpdo/class-reference/xpdoobject/metadata-accessors/getfield "getField") and silently ignored when it resolves to `false`.

## Syntax

``` php
void setDirty ([string $key = ''])
```

## Example

``` php
$resource = $modx->getObject('modResource', 42);
$resource->setDirty('pagetitle');
```

## See Also

- [isDirty](extending-modx/xpdo/class-reference/xpdoobject/state-accessors/isdirty "isDirty")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")