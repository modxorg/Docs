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

| Name  | Description                                                     |
| ----- | --------------------------------------------------------------- |
| mode  | Either 'new' or 'upd', depending on the circumstance.           |
| id    | The ID of the Chunk. This will be 0 for new chunks.             |
| chunk | A reference to the modChunk object. Will be null in new chunks. |

## See Also

- [System Events](extending-modx/plugins/system-events "System Events")
- [Plugins](extending-modx/plugins "Plugins")
