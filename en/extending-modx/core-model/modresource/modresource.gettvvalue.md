---
title: "modResource.getTVValue"
description: "Read the rendered value of a Template Variable"
---

## modResource.getTVValue

Returns the output of one Template Variable for this Resource. Names go through the parser; numeric IDs go straight to the model.

The value is produced by `renderOutput()`, so bindings, output modifiers and the TV render are applied. Returns `null` when no TV matches the argument.

## Syntax

``` php
mixed getTVValue ($pk)
```

- `$pk` _(mixed)_ TV ID when numeric, otherwise the TV name

## Example

``` php
$resource = $modx->getObject('modResource', array('id' => 5));
$byName = $resource->getTVValue('subtitle');
$byId = $resource->getTVValue(12);
```

## See Also

- [modResource](extending-modx/core-model/modresource)
- [modResource.setTVValue](extending-modx/core-model/modresource/modresource.settvvalue)
- [modResource.getTemplateVars](extending-modx/core-model/modresource/modresource.gettemplatevars)
