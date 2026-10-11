---
title: "modResource.setProperties"
description: "Write all properties of a Resource namespace"
---

## modResource.setProperties

Writes a whole namespace of properties in one call. With `$merge` set, `$newProperties` is merged over the values already in the namespace. Keys you leave out keep their previous values; with `$merge` false the namespace is replaced entirely. Other namespaces are never touched.

Returns the result of the field assignment; nothing reaches the database until `save()`.

## Syntax

``` php
boolean setProperties (array $newProperties [, string $namespace = 'core' [, boolean $merge = true]])
```

- `$newProperties` _(array)_ properties to write
- `$namespace` _(string)_ namespace to write into, by default `'core'`
- `$merge` _(boolean)_ merge with the existing namespace instead of replacing it, by default `true`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setProperties(array('color' => 'foobar', 'size' => '10'), 'mycomponent');
$resource->setProperties(array('color' => 'bar'), 'mycomponent', false);
$resource->save();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getProperties](extending-modx/core-model/modresource/modresource.getproperties)
- [modResource.setProperty](extending-modx/core-model/modresource/modresource.setproperty)
