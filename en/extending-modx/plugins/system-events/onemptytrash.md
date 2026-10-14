---
title: "OnEmptyTrash"
description: "Fires after resources are permanently deleted from the trash."
_old_id: "425"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onemptytrash"
---

## Event: OnEmptyTrash

Fires after the trash is emptied for the site. Also fires from the `resources/trash/purge` processor when purging already-trashed Resources.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name         | Description                                                                            |
| ------------ | -------------------------------------------------------------------------------------- |
| ids          | An array of the IDs of the Resources that were successfully permanently deleted.       |
| resources    | An array of the modResource objects that were deleted. **Passed by reference.**        |
| num\_deleted | The number of Resources actually deleted.                                              |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
