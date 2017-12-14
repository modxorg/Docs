---
title: "OnBeforeUserFormSave"
_old_id: "397"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforeuserformsave"
---

Event: OnBeforeUserFormSave
---------------------------

Fires after a form is submitted but before a User is saved in the manager.

Service: 1 - Parser Service Events   
Group: Users

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'upd' or 'new', depending on the circumstance.</td></tr><tr><td>user</td><td>A reference to the modUser object.</td></tr><tr><td>id</td><td>The ID of the User. Will be 0 for new Users.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")