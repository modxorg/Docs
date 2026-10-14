---
title: "OnResourceGroupBeforeSave"
description: "Fires right before a Resource Group is saved."
_old_id: "456"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupbeforesave"
---

## Event: OnResourceGroupBeforeSave

Fires right before a Resource Group is saved.

- Service: 1 - Parser Service Events
- Group: Security

## Event Parameters

| Name         | Description                                                        |
| ------------ | ------------------------------------------------------------------ |
| mode         | Either 'new' or 'upd', depending on the circumstance.              |
| resourceGroup | A reference to the modResourceGroup object.                       |
| cacheFlag    | The cache flag passed to the save operation.                       |

When a Resource Group is created through the `Security\ResourceGroup\Create` processor, this event fires twice — once from the processor (with `mode`, `data`, `id`, `resource_group` and `object` keys) and once from the model's `save()` (with the keys listed above). `OnResourceGroupSave` behaves the same way.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
