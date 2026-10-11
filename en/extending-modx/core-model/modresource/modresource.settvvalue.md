---
title: "modResource.setTVValue"
description: "Write the value of a Template Variable for a Resource"
---

## modResource.setTVValue

Stores a value for one Template Variable of this Resource. The `modTemplateVar` is loaded, `setValue()` is called with this Resource's ID, and the TV is saved immediately. No `save()` on the Resource is needed.

A value equal to the TV default needs no storage: `setValue()` skips a new record in that case. Returns `false` when no TV matches the argument, otherwise the result of the TV save.

## Syntax

``` php
boolean setTVValue ($pk, $value)
```

- `$pk` _(mixed)_ TV ID when numeric, otherwise the TV name
- `$value` _(string)_ value to store

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$resource->setTVValue('subtitle', 'foobar');
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.getTVValue](extending-modx/core-model/modresource/modresource.gettvvalue)
