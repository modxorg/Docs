---
title: "OnBeforeUserActivate"
description: "Fires before a User is activated in the manager."
_old_id: "395"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuseractivate"
---

## Event: OnBeforeUserActivate

Fires before a User's `active` status is switched on in the Manager. It runs in `security/user/update` when the status changes while editing a User, and in `security/user/activatemultiple` for bulk activation. A non-empty message from the Plugin prevents the change.

- Service: 1 - Parser Service Events
- Group: Users

## Event Parameters

| Name | Description                                                                       |
| ---- | --------------------------------------------------------------------------------- |
| id   | The ID of the User.                                                               |
| user | A reference to the modUser object. **Passed by reference**                        |
| mode | Either `upd` (single User in `security/user/update`) or `multiple` (bulk activation only). |


## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
