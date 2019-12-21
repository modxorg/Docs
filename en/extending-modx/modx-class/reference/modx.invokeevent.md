---
title: "modX.invokeEvent"
_old_id: "1085"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.invokeevent"
---

## modX::invokeEvent

Invokes a specified Event with an optional array of parameters.

## Syntax

API Doc: [modX::invokeEvent()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::invokeEvent())

``` php
void invokeEvent (string $eventName, [array $params = array ()])
```

## Example

Invoke the OnChunkRender event:

``` php
$modx->invokeEvent('OnChunkRender',array(
   'id' => $chunk->get('id'),
));
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
