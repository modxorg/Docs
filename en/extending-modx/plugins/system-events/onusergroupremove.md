---
title: "OnUserGroupRemove"
description: "Fires after a User Group is removed."
---

## Event: OnUserGroupRemove

Fires after a User Group is removed and its ACL entries are deleted, in `modUserGroup::remove()`.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name | Description |
| ---- | ----------- |
| usergroup | A reference to the modUserGroup object. |
| ancestors | An array of ancestor IDs passed to `remove()`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
