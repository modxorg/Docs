---
title: "OnUserGroupBeforeRemove"
description: "Fires right before a User Group is removed."
---

## Event: OnUserGroupBeforeRemove

Fires right before a User Group is removed, in `modUserGroup::remove()`.

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
