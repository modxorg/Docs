---
title: "OnDocFormDelete"
_old_id: "419"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformdelete"
---

## Event: OnDocFormDelete

Fires after a Resource is deleted via the manager.

Service: 1 - Parser Service Events 
Group: Documents

## Event Parameters

| Name | Description |
|------|-------------|
| resource | A reference to the modResource object. |
| id | The ID of the Resource. |
| children | An array of IDs of children of this resource which were deleted. |
## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")