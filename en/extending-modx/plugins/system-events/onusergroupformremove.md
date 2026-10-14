---
title: "OnUserGroupFormRemove"
description: "Fires after a User Group is removed from the manager form."
---

## Event: OnUserGroupFormRemove

Fires after a User Group is removed through the Remove User Group processor in the Manager.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name       | Description                                   |
| ---------- | --------------------------------------------- |
| id         | The ID of the removed User Group.             |
| user_group | A reference to the modUserGroup object.       |
| object     | The same modUserGroup object as `user_group`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
