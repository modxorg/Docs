---
title: "OnUserGroupBeforeSave"
description: "Fires right before a User Group is saved."
---

## Event: OnUserGroupBeforeSave

Fires right before a User Group is saved, in `modUserGroup::save()`.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name | Description |
| ---- | ----------- |
| mode | `modSystemEvent::MODE_NEW` when creating a User Group, or `modSystemEvent::MODE_UPD` when updating one. |
| usergroup | A reference to the modUserGroup object. |
| cacheFlag | The `cacheFlag` argument passed to `save()`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
