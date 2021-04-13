---
title: "modX.removeEventListener"
description: "Remove an event from the eventMap so it will not be invoked"
---

## modX::removeEventListener

Remove an event from the eventMap so it will not be invoked.

## Syntax

``` php
boolean removeEventListener (string $event, [integer $pluginId = 0])
```

- `$event` _(string)_ The name of the Event you wish to remove. **required**
- `$pluginId` _(integer)_ ID of certain Plugin for which I want to delete the Event 

API Doc: [modX::removeEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::removeEventListener())

## Examples

Prevent any Events from firing on 'OnChunkRender':

``` php
$modx->removeEventListener('OnChunkRender');
```

Prevent Events from firing on 'OnLoadDocument' for Plugin with ID = 2

``` php
$modx->removeEventListener('OnLoadDocument', 2);
```

## See Also

- [addEventListener](extending-modx/modx-class/reference/modx.addeventlistener "addEventListener")
- [removeAllEventListener](extending-modx/modx-class/reference/modx.removealleventlistener "removeAllEventListener")
- [modX](extending-modx/core-model/modx "MODX")
