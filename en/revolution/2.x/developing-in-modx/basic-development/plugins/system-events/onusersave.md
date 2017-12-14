---
title: "OnUserSave"
_old_id: "476"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onusersave"
---

Event: OnUserSave
-----------------

Fires when a User is saved.

Service: 1 - Parser Service Events   
Group: modUser

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>user</td><td>A reference to the modUser object.</td></tr><tr><td>mode</td><td>Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")