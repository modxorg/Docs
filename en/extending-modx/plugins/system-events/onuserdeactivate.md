---
title: "OnUserDeactivate"
description: "Fires after a User is deactivated."
---

## Event: OnUserDeactivate

Fires after the `active` status is switched off and the change saved — on the user form or in bulk from the Users grid.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name | Description |
| ---- | ----------- |
| id   | The ID of the deactivated User. |
| user | A reference to the modUser object. |
| mode | `modSystemEvent::MODE_UPD` when a single User is edited, or `multiple` when Users are deactivated in bulk. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
