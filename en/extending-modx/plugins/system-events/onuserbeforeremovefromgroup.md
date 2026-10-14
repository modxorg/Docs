---
title: "OnUserBeforeRemoveFromGroup"
description: "Fires before a User is removed from a User Group."
---

## Event: OnUserBeforeRemoveFromGroup

Fires before a User is removed from a User Group and its membership record is removed.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name       | Description                                                 |
| ---------- | ----------------------------------------------------------- |
| user       | A reference to the modUser object.                          |
| usergroup  | A reference to the modUserGroup object.                     |
| membership | A reference to the modUserGroupMember object being removed. |

A non-empty message from the Plugin prevents the User from being removed.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
