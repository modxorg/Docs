---
title: "OnUserGroupBeforeFormRemove"
description: "Fires before a User Group is removed from the manager form."
---

## Event: OnUserGroupBeforeFormRemove

Fires before a User Group is removed through the Remove User Group processor in the Manager.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name | Description |
| ---- | ----------- |
| id | The ID of the User Group being removed. |
| user_group | A reference to the modUserGroup object. |
| object | The same modUserGroup object as `user_group`. |

A non-empty message from the Plugin prevents the User Group from being removed.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
