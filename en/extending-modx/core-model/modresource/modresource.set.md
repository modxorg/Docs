---
title: "modResource.set"
description: "Set a field value, cleaning the alias on the way"
---

## modResource::set

Sets a field value by key or name. The override intercepts the `alias` key and runs the value through `cleanAlias()` first, so a stored alias is always URL-safe. Every other key goes to the parent implementation unchanged.

The return value is `true` only when the stored value actually changed. Assigning an identical value gives `false`; so does naming a field that does not exist, which is also logged as an error.

## Syntax

``` php
boolean set ($k [, $v = null [, string $vType = '']])
```

- `$k` _(string)_ field key or name
- `$v` _(mixed)_ value to store, by default `null`
- `$vType` _(string|callable)_ format of the value or a callable replacing the default assignment, by default `''`

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->set('alias', 'Hello World');
$resource->save();
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.cleanAlias](extending-modx/core-model/modresource/modresource.cleanalias)
