---
title: "OnResourceGroupRemove"
description: "Fires after a Resource Group is removed."
_old_id: "457"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onresourcegroupremove"
---

## Event: OnResourceGroupRemove

Fires after a Resource Group is removed. The event is invoked even if the removal itself failed — the result of the underlying `remove()` call is not checked.

- Service: 1 - Parser Service Events
- Group: Security

## Event Parameters

| Name         | Description                                             |
| ------------ | ------------------------------------------------------- |
| resourceGroup | A reference to the modResourceGroup object.            |
| ancestors    | An array of ancestors for the remove cascade operation. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
