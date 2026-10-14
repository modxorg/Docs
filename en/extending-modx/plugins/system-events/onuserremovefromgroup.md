---
title: "OnUserRemoveFromGroup"
description: "Fires after a User is removed from a User Group."
---

## Event: OnUserRemoveFromGroup

Fires after a User is removed from a User Group and the membership record is removed.

- Service: 1 - Parser Service Events
- Group: User Groups

## Event Parameters

| Name | Description |
| ---- | ----------- |
| user | A reference to the modUser object. |
| usergroup | A reference to the modUserGroup object. |
| membership | A reference to the removed modUserGroupMember object. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
