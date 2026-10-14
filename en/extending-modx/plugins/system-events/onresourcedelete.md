---
title: "OnResourceDelete"
description: "Fires immediately after deleting a Resource."
---

## Event: OnResourceDelete

Fires immediately after deleting a Resource, from the `Resource\Delete` processor. Also fires from the `Resource\Update` processor when a Resource is deleted through the edit form; that call passes only `id` and `resource`.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                          |
| -------- | ---------------------------------------------------- |
| id       | The ID of the deleted Resource.                      |
| children | An array of IDs of the child Resources that were deleted with it. Not passed when deleting from the Resource edit form. |
| resource | A reference to the deleted modResource object.       |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
