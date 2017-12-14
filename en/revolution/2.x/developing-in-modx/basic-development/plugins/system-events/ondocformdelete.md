---
title: "OnDocFormDelete"
_old_id: "419"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformdelete"
---

Event: OnDocFormDelete
----------------------

Fires after a Resource is deleted via the manager.

Service: 1 - Parser Service Events   
Group: Documents

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>resource</td><td>A reference to the modResource object.</td></tr><tr><td>id</td><td>The ID of the Resource.</td></tr><tr><td>children</td><td>An array of IDs of children of this resource which were deleted.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")