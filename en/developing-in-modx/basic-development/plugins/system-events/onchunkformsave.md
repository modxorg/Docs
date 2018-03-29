---
title: "OnChunkFormSave"
_old_id: "410"
_old_uri: "2.x/developing-in-modx/basic-development/plugins/system-events/onchunkformsave"
---

## Event: OnChunkFormSave

Fires after a Chunk is saved in the manager.

Service: 1 - Parser Service Events 
Group: Chunks

## Event Parameters

| Name | Description |
|------|-------------|
| mode | Either 'upd' or 'new', depending on the circumstance. |
| chunk | A reference to the modChunk object. |
| id | The ID of the chunk. |

## See Also

- [System Events](developing-in-modx/basic-development/plugins/system-events "System Events")
- [Plugins](developing-in-modx/basic-development/plugins "Plugins")