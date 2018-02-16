---
title: "OnUserFormSave"
_old_id: "473"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onuserformsave"
---

Event: OnUserFormSave
---------------------

Fires after a User is created or updated via the manager form.

Service: 1 - Parser Service Events   
Group: modUser

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>user</td><td>A reference to the modUser object.</td></tr><tr><td>id</td><td>The ID of the user.</td></tr><tr><td>mode</td><td>Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")