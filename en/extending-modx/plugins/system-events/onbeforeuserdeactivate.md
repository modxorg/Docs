---
title: "OnBeforeUserDeactivate"
description: "Fires before a User is deactivated."
---

## Event: OnBeforeUserDeactivate

Fires before a User is deactivated. It runs when the `active` status is switched off on the User form, or when Users are deactivated in bulk from the Users grid. A non-empty message from the Plugin prevents the change.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name | Description |
| ---- | ----------- |
| id   | The ID of the User being deactivated. |
| user | A reference to the modUser object. |
| mode | `modSystemEvent::MODE_UPD` when a single User is edited, or `multiple` when Users are deactivated in bulk. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
