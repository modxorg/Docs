---
title: "OnBeforeUserFormSave"
_old_id: "397"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuserformsave"
---

## Event: OnBeforeUserFormSave

Fires after a form is submitted but before a User is saved in the manager.

Service: 1 - Parser Service Events 
Group: Users

## Event Parameters

| Name | Description                                           |
| ---- | ----------------------------------------------------- |
| mode | Either 'upd' or 'new', depending on the circumstance. |
| user | A reference to the modUser object.                    |
| id   | The ID of the User. Will be 0 for new Users.          |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")