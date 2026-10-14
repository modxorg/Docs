---
title: "OnBeforeUserFormDelete"
description: "Fires before a User is deleted in the manager."
_old_id: "396"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuserformdelete"
---

## Event: OnBeforeUserFormDelete

Fires before a User is deleted in the Manager.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name   | Description                                       |
| ------ | ------------------------------------------------- |
| user   | A reference to the modUser object.                |
| id     | The ID of the User.                               |
| object | Alias of `user` — a reference to the same object. |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
