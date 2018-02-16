---
title: "OnContextBeforeSave"
_old_id: "414"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/oncontextbeforesave"
---

Event: OnContextBeforeSave
--------------------------

Happens right before a context is saved.

Service: 2 - Manager Access Events

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>context</td><td>A reference to the modContext object.</td></tr><tr><td>mode</td><td>Either 'new' (modSystemEvent::MODE\_NEW) or 'upd' (modSystemEvent::MODE\_UPD) depending on whether is a new object or an existing one.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")