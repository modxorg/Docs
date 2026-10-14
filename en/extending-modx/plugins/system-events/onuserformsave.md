---
title: "OnUserFormSave"
description: "Fires after a User is created or updated via the manager form."
_old_id: "473"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserformsave"
---

## Event: OnUserFormSave

Fires after a User is created or updated through the user form in the Manager.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name   | Description                                                                                                  |
| ------ | ------------------------------------------------------------------------------------------------------------ |
| user   | A reference to the modUser object.                                                                           |
| id     | The ID of the User.                                                                                          |
| mode   | `modSystemEvent::MODE_NEW` (`new`) for a new object, `modSystemEvent::MODE_UPD` (`upd`) for an existing one. |
| object | A reference to the saved User — the same object as `user`.                                                   |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
