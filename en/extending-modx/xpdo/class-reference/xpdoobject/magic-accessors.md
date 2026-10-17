---
title: "Magic accessors"
_old_id: "1874"
_old_uri: "2.x/class-reference/xpdoobject/magic-accessors"
---

## xPDOObject magic accessors

`xPDOObject` implements the magic methods `__get()`, `__set()` and `__isset()` so that fields and loaded related objects can be accessed as properties.

These accessors are only active when the corresponding hydration options are enabled:

- `xPDO::OPT_HYDRATE_FIELDS` — exposes fields as readable properties via `__get()`.
- `xPDO::OPT_HYDRATE_RELATED_OBJECTS` — exposes loaded related objects as readable properties via `__get()`.
- `xPDO::OPT_HYDRATE_ADHOC_FIELDS` — exposes ad-hoc (not declared) fields.

When the options are disabled, `__get()` silently returns `null` and `__set()` returns `false`, so accessing `$object->somefield` appears to work but yields nothing.

## Syntax

``` php
mixed __get (string $name)
boolean __set (string $name, mixed $value)
boolean __isset (string $name)
```

## Example

``` php
$modx->setOption(xPDO::OPT_HYDRATE_FIELDS, true);
$resource = $modx->getObject('modResource', 42);
echo $resource->pagetitle;
```

## See Also

- [Hydrating Fields](extending-modx/xpdo/create-xpdo-instance/hydrating-fields "Hydrating Fields")
- [xPDOObject](extending-modx/xpdo/class-reference/xpdoobject "xPDOObject")