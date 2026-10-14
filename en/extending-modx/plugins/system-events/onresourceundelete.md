---
title: "OnResourceUndelete"
description: "Fires immediately after a Resource is restored from the trash."
---

## Event: OnResourceUndelete

Fires immediately after a Resource is restored from the trash.

- Service: 1 - Parser Service Events
- Group: Resources

## Event Parameters

| Name     | Description                                     |
| -------- | ----------------------------------------------- |
| id       | The ID of the restored Resource.                |
| resource | A reference to the restored modResource object. |

## Remarks

The event fires from three places:

- the Undelete processor (`Resource/Undelete`),
- restoring a Resource from the trash grid (`Resource/Trash/Restore`),
- the Resource update processor, when a deleted Resource is published again (`Resource/Update`).


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
