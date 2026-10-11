---
title: "modResource.getProperties"
description: "Read all properties of a Resource namespace"
---

## modResource.getProperties

Returns the whole property array stored under `$namespace`, or an empty array when that namespace has no entry. The `properties` field holds one array per namespace; pass the namespace you want, not a flat list of keys.

## Syntax

``` php
array getProperties ([string $namespace = 'core'])
```

- `$namespace` _(string)_ namespace to read, by default `'core'`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setProperties(array('color' => 'foobar'), 'mycomponent');
$props = $resource->getProperties('mycomponent');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.setProperties](extending-modx/core-model/modresource/modresource.setproperties)
- [modResource.getProperty](extending-modx/core-model/modresource/modresource.getproperty)
