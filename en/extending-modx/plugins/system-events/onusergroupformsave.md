---
title: "OnUserGroupFormSave"
description: "Fires after a User Group is saved from the manager form."
---

## Event: OnUserGroupFormSave

Fires after a User Group is saved through the Create User Group and Update User Group processors in the Manager.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name | Description |
| ---- | ----------- |
| mode | `modSystemEvent::MODE_NEW` when a User Group was created, or `modSystemEvent::MODE_UPD` when it was updated. |
| id | The ID of the User Group. |
| user_group | A reference to the modUserGroup object. |
| object | The same modUserGroup object as `user_group`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
