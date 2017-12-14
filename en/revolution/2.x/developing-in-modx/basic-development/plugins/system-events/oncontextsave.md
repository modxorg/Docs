---
title: "OnContextSave"
_old_id: "418"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/oncontextsave"
---

Event: OnContextSave
--------------------

Happens whenever a context is saved.

Service: 2 - Manager Access Events

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>context</td><td>A reference to the modContext object.</td></tr><tr><td>mode</td><td>Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")