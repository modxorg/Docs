---
title: "modX.addEventListener"
description: "modX.addEventListener adds a plugin to the eventMap within the current execution cycle"
---

## modX::addEventListener

Add a plugin to the `eventMap` within the current execution cycle.

## Syntax

API Doc: [modX::addEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::addEventListener())

``` php
boolean addEventListener (string $event, integer $pluginId, [string $propertySetName = ''])
```

- `$event` _(string)_ Name of the event. **required**
- `$pluginId` _(integer)_ Plugin identifier to add to the event. **required**
- `$propertySetName` _(string)_ The name of property set bound to the plugin

## Example

Add a Plugin with ID 2 to the Event `OnChunkPrerender`:

``` php
$modx->addEventListener('OnChunkPrerender', 12);
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [Plugins](extending-modx/plugins "Plugins")
