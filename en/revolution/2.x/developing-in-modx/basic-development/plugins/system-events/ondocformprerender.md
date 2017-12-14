---
title: "OnDocFormPrerender"
_old_id: "420"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/ondocformprerender"
---

Event: OnDocFormPrerender
-------------------------

Fires before a Resource editing form is loaded in the manager.

Service: 1 - Parser Service Events   
Group: Documents

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'new' or 'upd', depending on the circumstance.</td></tr><tr><td>resource</td><td>A reference to the modResource object. Will be null for new Resources.</td></tr><tr><td>id</td><td>The ID of the Resource. Will be 0 for new Resources.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")