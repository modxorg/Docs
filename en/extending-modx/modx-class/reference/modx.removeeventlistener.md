---
title: "modX.removeEventListener"
_old_id: "1097"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.removeeventlistener"
---

## modX::removeEventListener

Remove an event from the eventMap so it will not be invoked.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::removeEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::removeEventListener())

``` php 
boolean removeEventListener (string $event)
```

## Example

Prevent any Events from firing on 'OnChunkRender':

``` php 
$modx->removeEventListener('OnChunkRender');
```

## See Also

- [modX](extending-modx/core-model/modx "modX")