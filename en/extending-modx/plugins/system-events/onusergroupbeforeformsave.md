---
title: "OnUserGroupBeforeFormSave"
description: "Fires before a User Group is saved from the manager form."
---

## Event: OnUserGroupBeforeFormSave

Fires before a User Group is saved through the Create User Group and Update User Group processors in the Manager.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name       | Description                                                                                             |
| ---------- | ------------------------------------------------------------------------------------------------------- |
| mode       | `modSystemEvent::MODE_NEW` when creating a User Group, or `modSystemEvent::MODE_UPD` when updating one. |
| data       | An array of the submitted User Group field values.                                                      |
| id         | The ID of the User Group, or 0 when creating a new User Group.                                          |
| user_group | A reference to the modUserGroup object.                                                                 |
| object     | The same modUserGroup object as `user_group`.                                                           |

A non-empty message from the Plugin prevents the User Group from being saved.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
