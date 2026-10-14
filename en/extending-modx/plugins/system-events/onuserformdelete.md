---
title: "OnUserFormDelete"
description: "Fires after a User is deleted via the manager form or a bulk delete."
_old_id: "472"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserformdelete"
---

## Event: OnUserFormDelete

Fires after a User is deleted in the Manager, and for each User in a bulk delete from the Users grid.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name   | Description                                                  |
| ------ | ------------------------------------------------------------ |
| user   | A reference to the modUser object.                           |
| id     | The ID of the User.                                          |
| object | A reference to the deleted User — the same object as `user`. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
