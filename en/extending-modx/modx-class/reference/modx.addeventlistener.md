---
title: "modX.addEventListener"
description: "modX.addEventListener"
---

## modX::addEventListener

Add a plugin to the eventMap within the current execution cycle.

## Syntax

``` php
boolean addEventListener (string $event, integer $pluginId, [string $propertySetName = ''])
```

- `$event` _(string)_ The name of the Snippet you wish to call. **required**
- `$pluginId` _(integer)_ Key value pairs of parameters to pass to the snippet, equivalent to `&key=`value``
- `$propertySetName` _(string)_ Key value pairs of parameters to pass to the snippet, equivalent to `&key=`value``

API Doc: [modX::addEventListener()](http://api.modx.com/revolution/2.2/db_core_model_modx_modx.class.html#%5CmodX::addEventListener())

## Example

Add a Plugin with ID 2 to the Event 'OnChunkPrerender':

``` php
$modx->addEventListener('OnChunkPrerender',12);
```

## See Also

- [modX](extending-modx/core-model/modx "modX")
- [Plugins](extending-modx/plugins "Plugins")
