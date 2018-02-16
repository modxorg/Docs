---
title: "OnChunkFormSave"
_old_id: "410"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformsave"
---

Event: OnChunkFormSave
----------------------

Fires after a Chunk is saved in the manager.

Service: 1 - Parser Service Events   
Group: Chunks

Event Parameters
----------------

<table><tbody><tr><th>Name</th><th>Description</th></tr><tr><td>mode</td><td>Either 'upd' or 'new', depending on the circumstance.</td></tr><tr><td>chunk</td><td>A reference to the modChunk object.</td></tr><tr><td>id</td><td>The ID of the chunk.</td></tr></tbody></table>See Also
--------

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")