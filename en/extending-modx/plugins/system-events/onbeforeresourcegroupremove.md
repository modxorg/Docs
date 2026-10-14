---
title: "OnBeforeResourceGroupRemove"
description: "Fires right before a Resource Group is removed."
---

## Event: OnBeforeResourceGroupRemove

Fires right before a Resource Group is removed. `modResourceGroup::remove()` invokes it, but the event has no entry in the core system event list (`transport.core.events.php`). The Manager's event dropdown does not show it; plugins can still subscribe by name. The Service and Group below match those of its registered but never invoked counterpart, `OnResourceGroupBeforeRemove`.

- Service: 1 - Parser Service Events
- Group: Security

## Event Parameters

| Name         | Description                                            |
| ------------ | ------------------------------------------------------ |
| resourceGroup | A reference to the modResourceGroup object.           |
| ancestors    | An array of ancestors for the remove cascade operation. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
