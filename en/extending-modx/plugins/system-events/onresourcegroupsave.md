---
title: "OnResourceGroupSave"
description: "Fires after a Resource Group is saved."
_old_id: "458"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupsave"
---

## Event: OnResourceGroupSave

Fires after a Resource Group is saved.

- Service: 1 - Parser Service Events
- Group: Security

## Event Parameters

| Name          | Description                                           |
| ------------- | ----------------------------------------------------- |
| mode          | Either 'new' or 'upd', depending on the circumstance. |
| resourceGroup | A reference to the modResourceGroup object.           |
| cacheFlag     | The cache flag passed to the save operation.          |

When a Resource Group is created through the `Security\ResourceGroup\Create` processor, this event fires twice — once from the model's `save()` (with the keys listed above) and once from the processor (with `mode`, `id`, `resource_group` and `object` keys). `OnResourceGroupBeforeSave` behaves the same way.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
