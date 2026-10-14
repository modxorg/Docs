---
title: "OnResourceRemoveFromResourceGroup"
description: "Fires after a Resource is removed from a Resource Group."
---

## Event: OnResourceRemoveFromResourceGroup

Fires after a Resource is removed from a Resource Group.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name         | Description                                                                                                                                        |
| ------------ | -------------------------------------------------------------------------------------------------------------------------------------------------- |
| mode         | The operation that caused the event: 'resource-create', 'resource-update', or 'resource-group-tree-remove-resource'.                               |
| resource     | A reference to the modResource object.                                                                                                             |
| resourceGroup | A reference to the modResourceGroup object.                                                                                                        |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
