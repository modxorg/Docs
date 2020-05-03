---
title: "OnBeforeDocFormDelete"
_old_id: "380"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforedocformdelete"
---

## Event: OnBeforeDocFormDelete

Fires before a Resource is deleted via the manager.

- Service: 1 - Parser Service Events
- Group: Documents

## Event Parameters

| Name     | Description                                                              |
| -------- | ------------------------------------------------------------------------ |
| resource | A reference to the modResource object.                                   |
| id       | The ID of the Resource.                                                  |
| children | An array of IDs of children of this resource which will also be deleted. |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
