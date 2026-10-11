---
title: "modResource.getProperty"
description: "Read one namespaced property of a Resource"
---

## modResource.getProperty

Reads a single value from the namespaced `properties` field of the Resource. Returns `$default` when either the namespace or the key is missing. An absent property and a property explicitly set to `null` cannot be distinguished.

The value lives on the object until `save()`; use `setProperty()` to write it.

## Syntax

``` php
mixed getProperty ($key [, string $namespace = 'core' [, mixed $default = null]])
```

- `$key` _(string)_ property name
- `$namespace` _(string)_ namespace the property belongs to, by default `'core'`
- `$default` _(mixed)_ value returned when the property is not set, by default `null`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$color = $resource->getProperty('color', 'mycomponent', 'foobar');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.setProperty](extending-modx/core-model/modresource/modresource.setproperty)
- [modResource.getProperties](extending-modx/core-model/modresource/modresource.getproperties)
