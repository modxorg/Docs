---
title: "modX.addEventListener"
description: "Adds a plugin to the eventMap within the current execution cycle"
---

## modX::addEventListener

Add a plugin to the `eventMap` within the current execution cycle.

## Syntax

``` php
boolean addEventListener (string $event, integer $pluginId, [string $propertySetName = ''])
```

- `$event` _(string)_ Name of the event. **required**
- `$pluginId` _(integer)_ Plugin identifier to add to the event. **required**
- `$propertySetName` _(string)_ The name of property set bound to the plugin


## Example

Add a Plugin with ID 12 to the Event `OnChunkFormPrerender`:

``` php
$modx->addEventListener('OnChunkFormPrerender', 12);
```

The event name is not validated, so a listener registered for a misspelled or non-existent event fails silently.

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [Plugins](extending-modx/plugins "Plugins")
