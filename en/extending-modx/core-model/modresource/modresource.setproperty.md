---
title: "modResource.setProperty"
description: "Write one namespaced property of a Resource"
---

## modResource.setProperty

Writes a single value into the namespaced `properties` field, creating the namespace when it does not exist yet. The value is held on the object until `save()`.

Returns the result of the field assignment: `true` only when the stored value changed, so writing an identical value gives `false`.

## Syntax

``` php
boolean setProperty ($key, $value [, string $namespace = 'core'])
```

- `$key` _(string)_ property name
- `$value` _(mixed)_ value to store
- `$namespace` _(string)_ namespace to store the property under, by default `'core'`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setProperty('color', 'foobar', 'mycomponent');
$resource->save();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getProperty](extending-modx/core-model/modresource/modresource.getproperty)
- [modResource.setProperties](extending-modx/core-model/modresource/modresource.setproperties)
