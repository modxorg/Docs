---
title: "OnUserFormPrerender"
description: "Fires before the user form is rendered in the manager."
---

## Event: OnUserFormPrerender

Fires before the Manager renders the user form on the New User and Edit User pages.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name | Description                                                                                      |
| ---- | ------------------------------------------------------------------------------------------------ |
| id   | The ID of the User being edited, or 0 when creating a new User.                                  |
| user | A reference to the modUser object; only passed when editing an existing User.                    |
| mode | `modSystemEvent::MODE_NEW` when creating a User, or `modSystemEvent::MODE_UPD` when editing one. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
