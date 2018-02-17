---
title: "OnChunkFormRender"
_old_id: "409"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformrender"
---

## Event: OnChunkFormRender

Fires during the rendering of a form. Useful for rendering HTML straight into the Chunk form.

Service: 1 - Parser Service Events 
Group: Chunks

## Event Parameters

NameDescriptionmodeEither 'new' or 'upd', depending on the circumstance.idThe ID of the Chunk. This will be 0 for new chunks.chunkA reference to the modChunk object. Will be null in new chunks.## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")