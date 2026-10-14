---
title: "OnUserActivate"
description: "Fires after a User is activated, from the manager user form or bulk activation."
_old_id: "468"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuseractivate"
---

## Event: OnUserActivate

Fires after a User is activated — from the user form in the Manager or in bulk. Third-party Components such as [Login](/extras/login "Login") use this event.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name | Description                                                                                                                |
| ---- | -------------------------------------------------------------------------------------------------------------------------- |
| id   | The ID of the activated User.                                                                                              |
| user | A reference to the modUser object.                                                                                         |
| mode | `modSystemEvent::MODE_UPD` when a single User is edited via the user form, or `multiple` when Users are activated in bulk. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
