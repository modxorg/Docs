---
title: "modX.addEventListener"
_old_id: "1052"
_old_uri: "2.x/developing-in-modx/other-development-resources/class-reference/modx/modx.addeventlistener"
---

## modX::addEventListener

Add a plugin to the eventMap within the current execution cycle.

## Syntax

API Doc: [http://api.modx.com/revolution/2.2/db\_core\_model\_modx\_modx.class.html#%5CmodX::addEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::addEventListener())

``` php 
boolean addEventListener (string $event, integer $pluginId)
```

## Example

Add a Plugin with ID 2 to the Event 'OnChunkPrerender':

``` php 
$modx->addEventListener('OnChunkPrerender',12);
```

## See Also

- [modX](developing-in-modx/other-development-resources/class-reference/modx "modX")
- [Plugins](extending-modx/plugins "Plugins")