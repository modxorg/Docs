---
title: "OnBeforeChunkFormSave"
_old_id: "379"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onbeforechunkformsave"
---

Event: OnBeforeChunkFormSave
----------------------------

Fires after a form is submitted but before a Chunk is saved in the manager.

Service: 1 - Parser Service Events   
Group: Chunks

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'upd' or 'new', depending on the circumstance.</td></tr><tr><td>chunk</td><td>A reference to the modChunk object.</td></tr><tr><td>id</td><td>The ID of the chunk. Will be 0 for new chunks.</td></tr></tbody></table>See Also
--------

- [System Events](/revolution/2.x/developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](/revolution/2.x/developing-in-modx/basic-development/plugins "Plugins")