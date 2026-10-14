---
title: "modX.getEventMap"
description: "Gets a map of events and registered plugins for the specified context."
_old_id: "1065"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.geteventmap"
---

## modX::getEventMap

Gets a map of events and registered plugins for the specified context.

## Syntax

``` php
array getEventMap (string $contextKey)
```

## Example

Get the event map for the current Context.

``` php
$map = $modx->getEventMap($modx->context->get('key'));
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
