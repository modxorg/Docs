---
title: "OnUserBeforeAddToGroup"
description: "Fires before a User is added to a User Group."
---

## Event: OnUserBeforeAddToGroup

Fires before a membership record is saved and a User is added to a User Group. It runs when:

- a member is added on the User Group form;
- a User is saved with groups on the user form;
- a new User is created with groups.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name       | Description                                                 |
| ---------- | ----------------------------------------------------------- |
| user       | A reference to the modUser object.                          |
| usergroup  | A reference to the modUserGroup object.                     |
| membership | A reference to the modUserGroupMember object being created. |

A non-empty message from the Plugin prevents the User from being added to the User Group.


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
