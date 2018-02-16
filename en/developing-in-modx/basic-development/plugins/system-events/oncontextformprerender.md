---
title: "OnContextFormPrerender"
_old_id: "415"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/oncontextformprerender"
---

Event: OnContextFormPrerender
-----------------------------

Fires prior to the context editing form loading. Useful for running custom javascript.

Service: 2 - Manager Access Events   
Group: modContext

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>key</td><td>The key of the context.</td></tr><tr><td>context</td><td>A reference to the modContext object.</td></tr><tr><td>mode</td><td>Either 'upd' or 'new', depending on the situation.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")